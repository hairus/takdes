<?php

namespace App\Imports;

use App\Models\nilaiT;
use App\Models\NilaiUh;
use App\Models\tas;
use App\Models\TugasSiswaExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UhImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $ta = tas::where('aktif', 1)->first();
        /*
        * ini di hapus dulu biar tidak menumpuk data yang ada
        */
        $hapus = NilaiUh::where([
            'ta_id'=> $ta->id,
            "mapel_id" => $rows[0]['mi'],
            "kelas_id" => $rows[0]['ki'],
            "guru_id" => auth()->user()->id,
        ])->delete();
        foreach ($rows as $row) {
            NilaiUh::create([
                'siswa_id' => $row['id'],
                'guru_id' => auth()->user()->id,
                'kelas_id' => $row['ki'],
                'mapel_id' => $row['mi'],
                'ta_id' => $ta->id,
                'uh1' => $row['uh1'],
                'uh2' => $row['uh2'],
                'uh3' => $row['uh3'],
                'uh4' => $row['uh4'],
                'uh5' => $row['uh5'],
            ]);
        }
    }
}
