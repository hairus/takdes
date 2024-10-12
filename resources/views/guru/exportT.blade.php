<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>MI</th>
        <th>KI</th>
        <th>Name</th>
        <th>Nis</th>
        <th>Mapel</th>
        <th>Rombel</th>
        <th>tugas1</th>
        <th>tugas2</th>
        <th>tugas3</th>
        <th>tugas4</th>
        <th>tugas5</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{{ $siswa->id }}</td>
            <td>{{ $mapel->id }}</td>
            <td>{{ $kelas->id }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $mapel->mapel }}</td>
            <td>{{ $siswa->rombel }}</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
    @endforeach
    </tbody>
</table>
