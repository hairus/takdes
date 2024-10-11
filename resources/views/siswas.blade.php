@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Siswa</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>nis</th>
                                    <th>Nisn</th>
                                    <th>JK</th>
                                    <th>tempat</th>
                                    <th>tgl</th>
                                    <th>Agama</th>
                                    <th>Rombel</th>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $key => $siswa)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($siswa->name) }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->jk }}</td>
                                            <td>{{ $siswa->tempat }}</td>
                                            <td>{{ $siswa->tgl }}</td>
                                            <td>{{ $siswa->agama }}</td>
                                            <td>{{ $siswa->rombel }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#siswas').DataTable();
        });
    </script>
@endsection
