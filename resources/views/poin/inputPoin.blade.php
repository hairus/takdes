@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Input Poin Siswa</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('exportPoin') }}" class="col-md-6" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih kelas</label>
                                <select name="kelas_id" id="" class="form-control" required>
                                    @foreach ($gkts as $value)
                                    <option value="{{ $value->kelas->id }}"> {{ $value->kelas->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-sm btn-info">Download Template</button>
                        </form>
                        <form action="{{ url('/importPoin')}}" enctype="multipart/form-data" method="post" class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="">Upload Poin</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <button class="btn btn-sm btn-primary" type="submit">upload</button>
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
                            <h5>Poin Siswa</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>kelas</th>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Total Poin</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($poins as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->siswas->name) }}</td>
                                            <td>{{ $value->kelas->kelas }}</td>
                                            <td>{{ $ta->ta }}</td>
                                            <td>{{ $ta->semester }}</td>
                                            <td>{{ $value->poin }}</td>
                                            <td>
                                                <a href="{{ url('delPoin/'.$value->id)}}">
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
