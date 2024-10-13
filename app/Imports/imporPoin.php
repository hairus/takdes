<?php

namespace App\Imports;

use App\Models\nilai_tatib;
use App\Models\nilaiEsktras;
use App\Models\nilaiT;
use App\Models\NilaiUh;
use App\Models\tas;
use App\Models\TugasSiswaExport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class imporPoin implements ToCollection, WithHeadingRow
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
        $hapus = nilai_tatib::where([
            'ta_id' => $ta->id,
            "guru_id" => Auth::user()->id,
        ])->delete();
        foreach ($rows as $row) {
            nilai_tatib::create([
                'siswa_id' => $row['id'],
                'kelas_id' => $row['ki'],
                "guru_id" => Auth::user()->id,
                'ta_id' => $ta->id,
                'poin' => $row['poin'],
            ]);
        }
    }
}
