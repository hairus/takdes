<?php

namespace App\Http\Controllers;

use App\Exports\ektraExport;
use App\Exports\kehadiranExport;
use App\Exports\TugasSiswaExport;
use App\Exports\UhExport;
use App\Imports\importEkstra;
use App\Imports\kehadiranImport;
use App\Imports\UhImport;
use App\Imports\UsersImport;
use App\Models\guru_mapel_kelas;
use App\Models\kehadiran;
use App\Models\nilaiEsktras;
use App\Models\nilaiT;
use App\Models\NilaiUh;
use App\Models\siswa_ekstra;
use App\Models\siswas;
use App\Models\tas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        $gm = guru_mapel_kelas::select('mapel_id')
            ->with('mapels')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('mapel_id')->get();

        $gk = guru_mapel_kelas::select('kelas_id')
            ->with('kelas')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('kelas_id')->get();

        return view('guru.index', compact('role', 'gm', 'gk'));
    }

    public function penT()
    {
        $ta = tas::where('aktif', 1)->first();
        $gm = guru_mapel_kelas::select('mapel_id')
            ->with('mapels')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('mapel_id')->get();

        $gk = guru_mapel_kelas::select('kelas_id')
            ->with('kelas')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('kelas_id')->get();

        $nilais = nilaiT::where([
            'guru_id' => auth()->user()->id,
            "ta_id" => $ta->id
        ])->with('mapels', 'kelas', 'siswas')->get();

        return view('guru.penT', compact('gm', 'gk', 'nilais'));
    }

    public function exportT(Request $request)
    {
        $mapel_id = $request->mapel_id;
        $kelas_id = $request->kelas_id;

        return Excel::download(new TugasSiswaExport($mapel_id, $kelas_id), 'tugas.xlsx');
    }


    public function importT(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx"
        ]);
        $file = $request->file('file');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = $request->file->move(public_path('excel'), $fileName);

        Excel::import(new UsersImport, $path);

        return back();
    }

    public function penUH()
    {
        $ta = tas::where('aktif', 1)->first();
        $gm = guru_mapel_kelas::select('mapel_id')
            ->with('mapels')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('mapel_id')->get();

        $gk = guru_mapel_kelas::select('kelas_id')
            ->with('kelas')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('kelas_id')->get();

        $nilais = NilaiUh::where([
            'guru_id' => auth()->user()->id,
            "ta_id" => $ta->id
        ])->with('mapels', 'kelas', 'siswas')->get();

        return view('guru.penUH', compact('gm', 'gk', 'nilais'));
    }

    public function exportUH(Request $request)
    {
        $mapel_id = $request->mapel_id;
        $kelas_id = $request->kelas_id;

        return Excel::download(new UhExport($mapel_id, $kelas_id), 'UH.xlsx');
    }


    public function importUh(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx"
        ]);
        $file = $request->file('file');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = $request->file->move(public_path('excel'), $fileName);

        Excel::import(new UhImport, $path);

        return back();
    }

    public function kehadiran()
    {
        $ta = tas::where('aktif', 1)->first();
        $gm = guru_mapel_kelas::select('mapel_id')
            ->with('mapels')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('mapel_id')->get();

        $gk = guru_mapel_kelas::select('kelas_id')
            ->with('kelas')
            ->where('guru_id', auth()->user()->id)
            ->groupBy('kelas_id')->get();

        $nilais = kehadiran::where([
            'guru_id' => auth()->user()->id,
            "ta_id" => $ta->id
        ])->with('mapels', 'kelas', 'siswas')->get();

        return view('guru.kehadiran', compact('gm', 'gk', 'nilais'));
    }

    public function exportKehadiran(Request $request)
    {
        $mapel_id = $request->mapel_id;
        $kelas_id = $request->kelas_id;

        return Excel::download(new kehadiranExport($mapel_id, $kelas_id), 'kehadiran.xlsx');
    }

    public function importKehadiran(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx"
        ]);
        $file = $request->file('file');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = $request->file->move(public_path('excel'), $fileName);

        Excel::import(new kehadiranImport, $path);

        return back();
    }

    public function mappingSiswaEkstra()
    {
        $siswas = siswas::orderBy('rombel')->orderBY('name')->get();
        $siswa_ekstras = siswa_ekstra::where('guru_id', auth()->user()->id)->get();
        $nilaisEkstras = nilaiEsktras::where('guru_id', auth()->user()->id)->get();

        return view('ekstra.index', compact('siswas', 'siswa_ekstras', 'nilaisEkstras'));
    }

    public function simpanMapingSiswa(Request $request)
    {
        $jum = count($request->siswa_id);
        $ta = tas::where('aktif', 1)->first();
        for ($x = 0; $x < $jum; $x++) {
            siswa_ekstra::create([
                "siswa_id" => $request->siswa_id[$x],
                "ekstra_id" => auth()->user()->ekstras->ekstra_id,
                "ta_id" => $ta->id,
                "guru_id" => auth()->user()->id
            ]);
        }
        return back();
    }

    public function delSiswaEkstra($id)
    {
        siswa_ekstra::find($id)->delete();

        return back();
    }

    public function InputNilaiEkstra()
    {
        $nilai = nilaiEsktras::where('guru_id', auth()->user()->id)->get();

        return view('ekstra.nilai', compact('nilai'));
    }

    public function delNilaiEkstra($id)
    {
        $del = nilaiEsktras::find($id)->delete();

        return back();
    }

    public function downloadEkstra()
    {
        return Excel::download(new ektraExport, 'ekstra.xlsx');
    }

    public function importNilaiEkstra(Request $request)
    {
        $request->validate([
            "file" => "required|mimes:xlsx"
        ]);
        $file = $request->file('file');

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $path = $request->file->move(public_path('excel'), $fileName);

        Excel::import(new importEkstra, $path);

        return back();
    }
}
