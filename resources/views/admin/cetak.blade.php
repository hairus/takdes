<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor Sisipan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1,
        .header h2,
        .header h3 {
            margin: 5px 0;
        }

        .header .school-info {
            margin-top: 10px;
        }

        .school-info p {
            margin: 5px 0;
        }

        .bold {
            font-weight: bold;
        }

        .student-info {
            margin: 20px 0;
            text-align: left;
        }

        .student-info table {
            width: 50%;
            margin: 0 auto;
        }

        .student-info td {
            padding: 5px 0;
        }

        .student-info td:first-child {
            text-align: left;
            width: 40%;
        }

        .student-info td:last-child {
            text-align: left;
            width: 60%;
        }

        .student-info table,
        .student-info td {
            border: none;
            /* Menghilangkan border */
        }

            {}

        hr {
            border-top: 2px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-bottom: 20px; */
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f0f0f0;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .section-title {
            margin-top: 20px;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
        }

        .footer-signature {
            display: flex;
            justify-content: space-between;
        }

        .footer-signature .sign {
            text-align: center;
            width: 30%;
        }

        .catatan-orangtua {
            border: 1px solid black;
            padding: 20px;
            margin-bottom: 30px;
        }

        .footer {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="header">
        <table boder="none" style="border:none">
            <tr>
                <td style="border:none;"><img src="{{ asset('logo-jatim.png') }}" alt="Logo Provinsi Jawa Timur"></td>
                <td style="border:none;">
                    <h2>Pemerintah Provinsi Jawa Timur</h2>
                    <h3>Dinas Pendidikan</h3>
                    <h4>SMAN 1 Kraksaan</h4>
                    <div class="school-info">
                        <p>Jalan Imam Bonjol No. 13 Kraksaan Telp. (0335) 841214</p>
                        <p><span class="bold">Website :</span> <a
                                href="http://sman1kraksaan.sch.id">http://sman1kraksaan.sch.id</a>
                            <span class="bold">Email :</span> sman1kraksaan@gmail.com
                        </p>
                        <p>Probolinggo 67282</p>
                    </div>
                </td>
            </tr>


        </table>
        <hr style="border-top: 2px solid black;">
        <h3>LAPORAN PERKEMBANGAN BELAJAR PESERTA DIDIK TENGAH SEMESTER</h3>
        <h3>TAHUN PELAJARAN 2024-2025</h3>

    </div>

    <div class="student-info">
        <table>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>: {{ strtoupper($siswa->name) }}</td>
            </tr>
            <tr>
                <td>Nomor Induk/NISN</td>
                <td>: {{ strtoupper($siswa->nis) }} / {{ strtoupper($siswa->nisn) }}</td>
            </tr>
            <tr>
                <td>Kelas/Semester</td>
                <td>: {{ strtoupper($siswa->rombel) }} / {{ $ta->semester }}</td>
            </tr>
        </table>
    </div>

    <!-- A. Laporan Hasil Belajar -->
    <div class="section-title">A. Laporan Perkembangan Hasil Belajar</div>
    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th colspan="5">Nilai Tugas</th>
                <th colspan="5">Nilai Ulangan Harian</th>
                <th colspan="3">Ketidakhadiran</th>
                <th rowspan="2">Dispen</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel_kelas as $key => $value)
                @php

                    $tugas1 = $value->mapels->tugass
                        ->where('tugas1', '!=', 0)
                        ->where('siswa_id', $siswa->id)
                        ->first();
                    $tugas2 = $value->mapels->tugass->where('tugas2', '!=', 0)->first();
                    $tugas3 = $value->mapels->tugass->where('tugas3', '!=', 0)->first();
                    $tugas4 = $value->mapels->tugass->where('tugas4', '!=', 0)->first();
                    $tugas5 = $value->mapels->tugass->where('tugas5', '!=', 0)->first();

                    $uh1 = $value->mapels->uhs->where('uh1', '!=', 0)->first();
                    $uh2 = $value->mapels->uhs->where('uh2', '!=', 0)->first();
                    $uh3 = $value->mapels->uhs->where('uh3', '!=', 0)->first();
                    $uh4 = $value->mapels->uhs->where('uh4', '!=', 0)->first();
                    $uh5 = $value->mapels->uhs->where('uh5', '!=', 0)->first();

                    $absen = $value->mapels->kehadirans
                        ->where('siswa_id', $siswa->id)
                        ->where('mapel_id', $value->mapel_id)
                        ->first();

                    $count1 = $value->mapels->tugass->where('tugas1', '!=', 0)->count();
                    $count2 = $value->mapels->tugass->where('tugas2', '!=', 0)->count();
                    $count3 = $value->mapels->tugass->where('tugas3', '!=', 0)->count();
                    $count4 = $value->mapels->tugass->where('tugas4', '!=', 0)->count();
                    $count5 = $value->mapels->tugass->where('tugas5', '!=', 0)->count();

                    $countU1 = $value->mapels->uhs->where('uh1', '!=', 0)->count();
                    $countU2 = $value->mapels->uhs->where('uh2', '!=', 0)->count();
                    $countU3 = $value->mapels->uhs->where('uh3', '!=', 0)->count();
                    $countU4 = $value->mapels->uhs->where('uh4', '!=', 0)->count();
                    $countU5 = $value->mapels->uhs->where('uh5', '!=', 0)->count();

                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: left">
                        <b>{{ $value->mapels->mapel }}</b>
                        <p style="font-size: 14px">Jml Tugas :
                            <b>{{ $count1 + $count2 + $count3 + $count4 + $count5 }}</b> Jml UH :
                            <b>{{ $countU1 + $countU2 + $countU3 + $countU4 + $countU5 }}</b>
                        </p>
                    </td>

                    <td>
                        @if ($tugas1)
                            {{ $tugas1['tugas1'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($tugas2)
                            {{ $tugas2['tugas2'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($tugas3)
                            {{ $tugas3['tugas3'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($tugas4)
                            {{ $tugas4['tugas4'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($tugas5)
                            {{ $tugas5['tugas5'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($uh1)
                            {{ $uh1['uh1'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($uh2)
                            {{ $uh2['uh2'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($uh3)
                            {{ $uh3['uh3'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($uh4)
                            {{ $uh4['uh4'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($uh5)
                            {{ $uh5['uh5'] }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($absen)
                            {{ $absen->sakit }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($absen)
                            {{ $absen->ijin }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($absen)
                            {{ $absen->alpa }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($absen)
                            {{ $absen->dispen }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
            <!-- Tambahkan mata pelajaran lainnya -->
        </tbody>
    </table>
    <div style="page-break-after: always;"></div>
    <!-- B. Laporan Ekstrakurikuler dan Prestasi -->
    <div class="section-title">B. Laporan Ekstrakurikuler dan Prestasi</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan Ekstrakurikuler/Prestasi</th>
                <th>Predikat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekstras as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="text-align: left">{{ $value->ekstras->ekstra }}</td>
                    <td>{{ $value->predikat }}</td>
                    <td style="text-align: left">{{ $value->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- C. Laporan Pelanggaran Tata Tertib -->
    <div class="section-title">C. Laporan Pelanggaran Tata Tertib</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Total Poin Pelanggaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left">1</td>
                <td style="text-align: left">
                    @if ($poin)
                        {{ $poin->poin }}
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <code style="margin: 0"><i>NB: Untuk Detail Pelanggaran Silakan Menghubungi BK / Tim Tatib Sekolah</i></code>
    <!-- D. Catatan/Tanggapan Orang Tua -->

    <div class="section-title">D. Catatan/Tanggapan Orang Tua</div>
    <div class="catatan-orangtua">
        <!-- Ruang untuk catatan/tanggapan orang tua -->
    </div>

    <!-- Tanda Tangan -->
    {{-- <div class="footer-signature">
        <table style="border: none">
            <tr style="border: none">
                <td style="border: none">
                    <div class="sign" style="width: 100%">
                        <p>Wali Murid,</p>
                        <br><br>
                        <p>__________________________</p>
                    </div>
                </td>
                <td style="border: none">
                    <div class="sign" style="width: 100%">
                        <p>Kraksaan, 18 Oktober 2024</p>
                        <p>Wali Kelas,</p>
                        <br><br>
                        <p><strong>{{ auth()->user()->name }}</strong><br>
                            NIP. {{ auth()->user()->nip }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer" style="text-align: center;">
        <p>Mengetahui,</p>
        <p>Kepala Sekolah,</p>
        <br><br>
        <p><strong>BAMBANG SUDIARTO, S.Pd., M.M.Pd.</strong><br>
            NIP. 19680418 199102 1 003</p>
    </div> --}}

</body>

</html>
<div style="page-break-after: always;"></div>
