<?php

namespace App\Exports;

use App\Models\kelas;
use App\Models\mapels;
use App\Models\siswa_ekstra;
use App\Models\siswas;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class eksporPoin implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $kelas_id;

    public function __construct(int $kelas_id)
    {
        $this->kelas_id = $kelas_id;
    }

    public function view(): View
    {
        $kelas = kelas::where('id', $this->kelas_id)->first();
        $siswas = siswas::where([
            "rombel" => $kelas->kelas
        ])->orderBy('name')->get();

        return view('poin.export', [
            'siswas' => $siswas,
            "kelas" => $kelas
        ]);
    }
}
