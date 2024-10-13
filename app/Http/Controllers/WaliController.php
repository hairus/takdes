<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\mapel_kelas;
use App\Models\nilai_tatib;
use App\Models\nilaiEsktras;
use App\Models\siswa_ekstra;
use App\Models\siswas;
use App\Models\tas;
use App\Models\wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ta = tas::where('aktif', 1)->first();
        $wali = wali::where([
            'guru_id' => Auth::user()->id,
            "ta_id" => $ta->id
        ])->first();

        $kelas = kelas::find($wali->kelas_id)->first();

        $siswas = siswas::where('rombel', $kelas->kelas)->orderBy('name', 'ASC')->get();

        return view('wali.index', compact('siswas', 'ta'));
    }

    public function cetak($id)
    {

        $siswa = siswas::find($id);
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
        }])->where('kelas_id', $wali->kelas_id)->get();

        $ekstras = nilaiEsktras::where('siswa_id', $siswa->id)->get();

        $poin = nilai_tatib::where('siswa_id', $siswa->id)->first();

        return view('cetak', compact('siswa', 'ta', 'mapel_kelas', 'ekstras', 'poin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(wali $wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(wali $wali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wali $wali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wali $wali)
    {
        //
    }
}
