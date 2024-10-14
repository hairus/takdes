<?php

namespace App\Http\Controllers;

use App\Models\ekstraKulikuler;
use App\Models\guru_ekstra;
use App\Models\guru_kelas_tatib;
use App\Models\guru_mapel_kelas;
use App\Models\guru_tatib;
use App\Models\kelas;
use App\Models\mapel_kelas;
use App\Models\mapels;
use App\Models\nilai_tatib;
use App\Models\nilaiEsktras;
use App\Models\siswas;
use App\Models\tas;
use App\Models\User;
use App\Models\wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//    public function cetak()
//    {
//        return view('cetak');
//    }

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

        for ($x = 0; $x < $jumKelas; $x++) {

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
        for ($x = 0; $x < $jumMapel; $x++) {
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

    public function wali()
    {
        $gurus = User::whereDoesntHave('walis')->where('role', 'guru')->get();
        $kelas = kelas::all();

        $walis = wali::with('kelas', 'guru', 'tas')->get();

        return view('wali', compact('gurus', 'kelas', 'walis'));
    }

    public function simpanWali(Request $request)
    {
        $ta = tas::where('aktif', 1)->first();
        $sim = wali::create([
            "guru_id" => $request->guru_id,
            "kelas_id" => $request->kelas_id,
            "ta_id" => $ta->id,
        ]);

        return back();
    }

    public function delWali($id)
    {
        wali::find($id)->delete();

        return back();
    }

    public function ekstra()
    {
        $ektras = ekstraKulikuler::all();

        $gurus = User::whereDoesntHave('ekstras')->where('role', 'guru')->get();

        $guruEkstras = guru_ekstra::with('gurus', 'ekstras')->get();

        return view('ekstras', compact('ektras', 'gurus', 'guruEkstras'));
    }

    public function simpanEkstra(Request $request)
    {
        $sim = ekstraKulikuler::create([
            "ekstra" => $request->ekstra
        ]);

        return back();
    }

    public function simpanGuruEkstra(Request $request)
    {
        $ta = tas::where('aktif', 1)->first();
        $sim = guru_ekstra::create([
            "guru_id" => $request->guru_id,
            "ekstra_id" => $request->ekstra_id,
            "ta_id" => $ta->id
        ]);

        return back();
    }

    public function delEkstra($id)
    {
        $ekstra = ekstraKulikuler::find($id)->delete();

        return back();
    }

    public function delGuruEkstra($id)
    {
        $guruEkstras = guru_ekstra::find($id)->delete();

        return back();
    }

    public function tatibs()
    {
        $gurus = User::where('role', 'guru')->get();
        $kelas = kelas::all();
        $guruTatibs = guru_tatib::get();
        $gkts = guru_kelas_tatib::get();

        return view('tatibs', compact('gurus', 'kelas', 'guruTatibs', 'gkts'));
    }

    public function simpanGuruTatib(Request $request)
    {
        guru_tatib::create([
            "guru_id" => $request->guru_id,
        ]);

        return back();
    }

    public function deleteGuruTatib($id)
    {
        guru_tatib::find($id)->delete();

        return back();
    }

    public function simGuruKelasTatib(Request $request)
    {
        $jum = count($request->kelas_id);
        $ta = tas::where('aktif', 1)->first();
        for ($x = 0; $x < $jum; $x++) {
            $sim = guru_kelas_tatib::create([
                "guru_id" => $request->guru_id,
                "kelas_id" => $request->kelas_id[$x],
                "ta_id" => $ta->id
            ]);
        }

        return back();
    }

    public function delgkt($id)
    {
        $gtk = guru_kelas_tatib::find($id)->delete();

        return back();
    }

    public function monitor()
    {
        $kelas = kelas::all();

        return view('admin.monitor', compact('kelas'));
    }

    public function showSiswas($id)
    {
        $kelas = kelas::where('id', $id)->first();

        $siswas = siswas::where('rombel', $kelas->kelas)->orderBy('name')->get();

        return view('admin.showSiswa', compact('siswas'));
    }

    public function cetak($id)
    {
        $siswa = siswas::find($id);
        $kelas_id = kelas::where('kelas', $siswa->rombel)->first()->id;
        $ta = tas::where('aktif', 1)->first();
        $wali = wali::where([
            'guru_id' => Auth::user()->id,
            "ta_id" => $ta->id
        ])->first();

        $mapel_kelas = mapel_kelas::with(['mapels' => function ($q) use ($siswa) {
            $q->with(['tugass' => function ($y) use ($siswa) {
                $y->where('siswa_id', $siswa->id);
            }]);
            $q->with(['uhs' => function ($y) use ($siswa) {
                $y->where('siswa_id', $siswa->id);
            }]);
        }])->where('kelas_id', $kelas_id)->get();

        $ekstras = nilaiEsktras::where('siswa_id', $siswa->id)->get();

        $poin = nilai_tatib::where('siswa_id', $siswa->id)->first();

        return view('admin.cetak', compact('siswa', 'ta', 'mapel_kelas', 'ekstras', 'poin'));
    }
}
