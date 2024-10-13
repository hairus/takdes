<?php

namespace App\Imports;

use App\Models\kehadiran;
use App\Models\nilaiT;
use App\Models\tas;
use App\Models\TugasSiswaExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class kehadiranImport implements ToCollection, WithHeadingRow
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
        $hapus = kehadiran::where([
            'ta_id'=> $ta->id,
            "mapel_id" => $rows[0]['mi'],
            "kelas_id" => $rows[0]['ki'],
            "guru_id" => auth()->user()->id,
        ])->delete();
        foreach ($rows as $row) {
            kehadiran::create([
                'siswa_id' => $row['id'],
                'guru_id' => auth()->user()->id,
                'kelas_id' => $row['ki'],
                'mapel_id' => $row['mi'],
                'ta_id' => $ta->id,
                'sakit' => $row['sakit'],
                'ijin' => $row['ijin'],
                'alpa' => $row['alpa'],
                'dispen' => $row['dispen'],
            ]);
        }
    }
}
