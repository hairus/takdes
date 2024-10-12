<?php

namespace App\Http\Controllers;

use App\Exports\TugasSiswaExport;
use App\Imports\UsersImport;
use App\Models\guru_mapel_kelas;
use App\Models\nilaiT;
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
}
