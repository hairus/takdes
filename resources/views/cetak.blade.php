<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor Siswa Kelas XI</title>
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
            margin-bottom: 20px;
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
        <img src="logo-jatim.png" alt="Logo Provinsi Jawa Timur">
        <h1>Pemerintah Provinsi Jawa Timur</h1>
        <h2>Dinas Pendidikan</h2>
        <h2>SMAN 1 Kraksaan</h2>
        <div class="school-info">
            <p>Jalan Imam Bonjol No. 13 Kraksaan Telp. (0335) 841214</p>
            <p><span class="bold">Website :</span> <a href="http://sman1kraksaan.sch.id">http://sman1kraksaan.sch.id</a>
                <span class="bold">Email :</span> sman1kraksaan@gmail.com
            </p>
            <p>Probolinggo 67282</p>
        </div>
        <hr style="border-top: 2px solid black;">
        <h3>LAPORAN PERKEMBANGAN BELAJAR PESERTA DIDIK TENGAH SEMESTER</h3>
        <h3>TAHUN PELAJARAN 2023-2024</h3>
    </div>

    <div class="student-info">
        <table>
            <tr>
                <td>Nama Peserta Didik</td>
                <td>: Zulmi Rizki Maulana</td>
            </tr>
            <tr>
                <td>Nomor Induk/NISN</td>
                <td>: 0071652394 / 11559</td>
            </tr>
            <tr>
                <td>Kelas/Semester</td>
                <td>: XI TEKNIK 2 / Semester 2</td>
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
                <th colspan="4">Ketidakhadiran</th>
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
                <th>Dispen</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>
                    <b>P. A. Islam dan Budi Pekerti</b>
                    <p style="font-size: 14px">Jml Tugas : <b>2</b> Jml UH : <b>2</b></p>
                </td>
                <td>80</td>
                <td>85</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>80</td>
                <td>85</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Pancasila</td>
                <td>90</td>
                <td>88</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>100</td>
                <td>88</td>
                <td>90</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <!-- Tambahkan mata pelajaran lainnya -->
        </tbody>
    </table>

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
            <tr>
                <td>1</td>
                <td>Paskibra</td>
                <td>B</td>
                <td>Baik dan aktif dalam mengikuti kegiatan ekstrakurikuler</td>
            </tr>
        </tbody>
    </table>

    <!-- C. Laporan Pelanggaran Tata Tertib -->
    <div class="section-title">C. Laporan Pelanggaran Tata Tertib</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pelanggaran Tata Tertib</th>
                <th>Point</th>
                <th>Banyak Pelanggaran</th>
                <th>Jumlah Point</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Terlambat</td>
                <td>10</td>
                <td>2</td>
                <td>20</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tidak mengikuti pelajaran</td>
                <td>20</td>
                <td>1</td>
                <td>20</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total Jumlah Point Pelanggaran</strong></td>
                <td><strong>40</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- D. Catatan/Tanggapan Orang Tua -->
    <div class="section-title">D. Catatan/Tanggapan Orang Tua</div>
    <div class="catatan-orangtua">
        <!-- Ruang untuk catatan/tanggapan orang tua -->
    </div>

    <!-- Tanda Tangan -->
    <div class="footer-signature">
        <div class="sign">
            <p>Wali Murid,</p>
            <br><br>
            <p>__________________________</p>
        </div>
        <div class="sign">
            <p>Kraksaan, 26 Maret 2024</p>
            <p>Wali Kelas,</p>
            <br><br>
            <p><strong>Novilia Gita Nuraini, S.Pd.</strong><br>
                NIP. 19880120203212026</p>
        </div>
    </div>

    <div class="footer" style="text-align: center;">
        <p>Mengetahui,</p>
        <p>Kepala Sekolah,</p>
        <br><br>
        <p><strong>BAMBANG SUDIARTO, S.Pd., M.M.Pd.</strong><br>
            NIP. 19680418 199102 1 003</p>
    </div>

</body>

</html>
