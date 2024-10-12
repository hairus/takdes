<?php

namespace App\Imports;

use App\Models\nilaiT;
use App\Models\tas;
use App\Models\TugasSiswaExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
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
        $hapus = nilaiT::where([
            'ta_id'=> $ta->id,
            "mapel_id" => $rows[0]['mi'],
            "kelas_id" => $rows[0]['ki'],
            "guru_id" => auth()->user()->id,
        ])->delete();
        foreach ($rows as $row) {
            nilaiT::create([
                'siswa_id' => $row['id'],
                'guru_id' => auth()->user()->id,
                'kelas_id' => $row['ki'],
                'mapel_id' => $row['mi'],
                'ta_id' => $ta->id,
                'tugas1' => $row['tugas1'],
                'tugas2' => $row['tugas2'],
                'tugas3' => $row['tugas3'],
                'tugas4' => $row['tugas4'],
                'tugas5' => $row['tugas5'],
            ]);
        }
    }
}
