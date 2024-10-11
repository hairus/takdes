@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $key => $kls)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $kls->kelas }}</td>
                                            <td>Jumlah Siswa {{ $kls->siswas->count() }}</td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-sm btn-danger" disabled>Delete</button>
                                                </a>
                                            </td>
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
