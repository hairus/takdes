<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>MI</th>
        <th>KI</th>
        <th>Name</th>
        <th>Nis</th>
        <th>Mapel</th>
        <th>Kelas</th>
        <th>Sakit</th>
        <th>Ijin</th>
        <th>Alpa</th>
        <th>Dispen</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{{ $siswa->id }}</td>
            <td>{{ $mapel->id }}</td>
            <td>{{ $kelas->id }}</td>
            <td>{{ strtoupper($siswa->name) }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $mapel->mapel }}</td>
            <td>{{ $siswa->rombel }}</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
    @endforeach
    </tbody>
</table>
