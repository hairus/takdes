<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>EI</th>
        <th>Name</th>
        <th>Nis</th>
        <th>Kelas</th>
        <th>Ekstra</th>
        <th>Predikat</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{{ $siswa->siswa_id }}</td>
            <td>{{ $siswa->ekstras->id }}</td>
            <td>{{  strtoupper($siswa->siswas->name) }}</td>
            <td>{{ $siswa->siswas->nis }}</td>
            <td>{{ $siswa->siswas->rombel }}</td>
            <td>{{ $siswa->ekstras->ekstra }}</td>
            <td>B</td>
            <td>Baik dan aktif dalam mengikuti kegiatan ekstrakurikuler</td>
        </tr>
    @endforeach
    </tbody>
</table>
