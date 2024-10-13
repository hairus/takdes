@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Siswa Ekstra</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('downloadEkstra') }}">
                            <button class="btn btn-sm btn-info">Download Template</button>
                        </a>
                        <form action="{{ url('importNilaiEkstra') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"></div>
                            <label for="">Import Nilai Ekstra</label>
                            <input type="file" name="file" class="form-control" required>
                    </div>
                    <button class="btn btn-primary btn-sm col-md-1"
                        style="margin-left: 10px; margin-bottom: 10px">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <div class="card-header">
                        <h5>Siswa Ekstra</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="siswas">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nis</th>
                                <th>Ekstra</th>
                                <th>kelas</th>
                                <th>Predikat</th>
                                <th>Keterangan</th>
                                <th>#</th>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ strtoupper($value->siswas->name) }}</td>
                                        <td>{{ $value->siswas->nis }}</td>
                                        <td>{{ $value->ekstras->ekstra }}</td>
                                        <td>{{ $value->siswas->rombel }}</td>
                                        <td>{{ $value->predikat }}</td>
                                        <td>{{ $value->keterangan }}</td>
                                        <td>
                                            <a href="{{ url('/delSiswaEkstra/' . $value->id) }}">
                                                <button class="btn btn-danger btn-sm">Delete</button>
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
            $('.select2').select2();
        });
    </script>
@endsection
