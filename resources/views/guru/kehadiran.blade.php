@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Input Kehadiran</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/exportKehadiran') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih Mapel</label>
                                <select name="mapel_id" id="" class="form-control" required>
                                    @foreach ($gm as $m)
                                        <option value="{{ $m->mapels->id }}">{{ $m->mapels->mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kelas</label>
                                <select name="kelas_id" id="" class="form-control" required>
                                    @foreach ($gk as $k)
                                        <option value="{{ $k->kelas->id }}">{{ $k->kelas->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-sm btn-info">Download Template</button>
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
                            <h3>Import Kehadiran</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('importKehadiran') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Import Tugas</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <button class="btn btn-sm btn-primary">Import Nilai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5>Show Kehadiran</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsie">
                            <table class="table" id="nilai">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nis</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>Sakit</th>
                                    <th>Ijin</th>
                                    <th>Alpa</th>
                                    <th>Dispen</th>
                                </thead>
                                <tbody>
                                    @foreach ($nilais as $key => $nilai)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ strtoupper($nilai->siswas->name) }}</td>
                                        <td>{{ $nilai->siswas->nis }}</td>
                                        <td>{{ $nilai->mapels->mapel }}</td>
                                        <td>{{ $nilai->kelas->kelas }}</td>
                                        <td>{{ $nilai->sakit }}</td>
                                        <td>{{ $nilai->ijin }}</td>
                                        <td>{{ $nilai->alpa }}</td>
                                        <td>{{ $nilai->dispen }}</td>
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
            $('#nilai').DataTable();
        });
    </script>
@endsection
