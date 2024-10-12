<?php

namespace App\Http\Controllers;

use App\Models\guru_mapel_kelas;
use App\Models\kelas;
use App\Models\mapel_kelas;
use App\Models\mapels;
use App\Models\siswas;
use App\Models\tas;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
        $gurus = User::where('role', 'guru')->get();

        return view('gurus', compact('gurus'));
     }

    public function cetak()
    {
        return view('cetak');
    }

    public function guru()
    {
        $gurus = User::where('role', 'guru')->get();

        return view('gurus', compact('gurus'));
    }

    public function gurus()
    {
        $gurus = User::where('role', 'guru')->get();
        $mapels = mapels::all();
        $kelas = kelas::all();
        $gmks = guru_mapel_kelas::with('kelas', 'gurus', 'mapels')->get();

        return view('gmk', compact('gurus', 'mapels', 'kelas', 'gmks'));
    }

    public function siswas()
    {
        $siswas = siswas::orderBy('rombel')->orderbY('name')->get();

        return view('siswas', compact('siswas'));
    }

    public function simpanGmk(Request $request)
    {
        $request->validate([
            "guru" => 'required',
            "kelas" => 'required',
            "mapel" => 'required'
        ]);

        $jumKelas = count($request->kelas);
        $ta = tas::where('aktif', 1)->first();

        for($x = 0; $x < $jumKelas; $x++) {

            $sim = guru_mapel_kelas::create([
                "kelas_id" => $request->kelas[$x],
                "guru_id" => $request->guru,
                "mapel_id" => $request->mapel,
                "ta_id" => $ta->id
            ]);
        }

        return back();
    }

    public function mapels()
    {
        $mapels = mapels::all();

        return view('mapels', compact('mapels'));
    }

    public function delGmk($id)
    {
        $del = guru_mapel_kelas::find($id)->delete();

        return back();
    }

    public function delMapel($id)
    {
        $mapels = mapels::find($id)->delete();

        return back();
    }

    public function mapelKelas()
    {
        $mapels = mapels::all();
        $kelas = kelas::all();
        $mapel_kelas = mapel_kelas::with('tas', 'mapels', 'kelas')->get();

        return view('mapelKelas', compact('mapels', 'kelas', 'mapel_kelas'));
    }

    public function kelas()
    {
        $kelas = kelas::with('siswas')->get();

        return view('kelas', compact('kelas'));
    }

    public function simpanMapelKelas(Request $request)
    {
        $request->validate([
            "mapel" => 'required',
            "kelas" => 'required'
        ]);
        $ta = tas::where('aktif', 1)->first();

        $jumMapel = count($request->mapel);
        for($x = 0; $x < $jumMapel; $x++) {
            $sim = mapel_kelas::create([
                "mapel_id" => $request->mapel[$x],
                "kelas_id" => $request->kelas,
                "ta_id" => $ta->id
            ]);
        }

        return back();
    }

    public function delMapelKelas($id)
    {
        $del = mapel_kelas::find($id)->delete();

        return back();
    }
}
