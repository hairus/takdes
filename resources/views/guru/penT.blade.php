@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Penilaian Tugas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/exportT') }}" method="post">
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
                            <button class="btn btn-sm btn-info">Export Excel</button>
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
                            <h3>Import Tugas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('imporT') }}" method="post" enctype="multipart/form-data">
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
                            <h5>Show Nilai Tugas</h5>
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
                                    <th>Tugas 1</th>
                                    <th>Tugas 2</th>
                                    <th>Tugas 3</th>
                                    <th>Tugas 4</th>
                                    <th>Tugas 5</th>
                                </thead>
                                <tbody>
                                    @foreach ($nilais as $key => $nilai)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $nilai->siswas->name }}</td>
                                        <td>{{ $nilai->siswas->nis }}</td>
                                        <td>{{ $nilai->mapels->mapel }}</td>
                                        <td>{{ $nilai->kelas->kelas }}</td>
                                        <td>{{ $nilai->tugas1 }}</td>
                                        <td>{{ $nilai->tugas2 }}</td>
                                        <td>{{ $nilai->tugas3 }}</td>
                                        <td>{{ $nilai->tugas4 }}</td>
                                        <td>{{ $nilai->tugas5 }}</td>
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
