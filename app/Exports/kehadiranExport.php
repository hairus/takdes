<?php

namespace App\Exports;

use App\Models\kelas;
use App\Models\mapels;
use App\Models\siswas;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class kehadiranExport implements FromView
{

    public function __construct(int $mapel_id, int $kelas_id)
    {
        $this->mapel_id = $mapel_id;
        $this->kelas_id = $kelas_id;
    }

    public function view(): View
    {
        $siswa = siswas::where('rombel', 'X-A')->orderBy('name', 'ASC')->get();
        $mapel = mapels::where('id', $this->mapel_id)->first();
        $kelas = kelas::where('id', $this->kelas_id)->first();

        return view('guru.exportKehadiran', [
            'siswas' => $siswa,
            "mapel"=> $mapel,
            "kelas" => $kelas
        ]);
    }
}
