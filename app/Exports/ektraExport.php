<?php

namespace App\Exports;

use App\Models\kelas;
use App\Models\mapels;
use App\Models\siswa_ekstra;
use App\Models\siswas;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ektraExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $siswas = siswa_ekstra::where('guru_id', auth()->user()->id)->get();

        return view('ekstra.export', [
            'siswas' => $siswas,
        ]);
    }
}
