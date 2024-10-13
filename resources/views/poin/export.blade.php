<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>KI</th>
        <th>Name</th>
        <th>Nis</th>
        <th>Kelas</th>
        <th>Poin</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siswas as $siswa)
        <tr>
            <td>{{ $siswa->id }}</td>
            <td>{{ $kelas->id }}</td>
            <td>{{  strtoupper($siswa->name) }}</td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->rombel }}</td>
            <td>0</td>
        </tr>
    @endforeach
    </tbody>
</table>
