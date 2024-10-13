<?php

namespace App\Imports;

use App\Models\nilaiEsktras;
use App\Models\nilaiT;
use App\Models\NilaiUh;
use App\Models\tas;
use App\Models\TugasSiswaExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class importEkstra implements ToCollection, WithHeadingRow
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
        $hapus = nilaiEsktras::where([
            'ta_id' => $ta->id,
            "guru_id" => auth()->user()->id,
        ])->delete();
        foreach ($rows as $row) {
            nilaiEsktras::create([
                'siswa_id' => $row['id'],
                'ekstra_id' => $row['ei'],
                "guru_id" => auth()->user()->id,
                'ta_id' => $ta->id,
                'predikat' => $row['predikat'],
                'keterangan' => $row['keterangan']
            ]);
        }
    }
}
