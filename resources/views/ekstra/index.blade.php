@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Mapping Siswa Ekstra</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 14px"><b>{{ Auth::user()->name }}</b></p>
                        <p>Pembina : <b>{{ Auth::user()->ekstras->ekstras->ekstra }}</b></p>
                        <code>Pilih Siswa sesuai dengan esktra yang anda bina</code>
                        <hr>
                        <form action="{{ url('simpanMapingSiswa') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih Siswa</label>
                                <select name="siswa_id[]" id="" multiple="multiple" class="form-control select2">
                                    @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ strtoupper($siswa->name) }} - {{ $siswa->rombel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-sm btn-primary">Simpan</button>
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
                                    <th>Ekstra</th>
                                    <th>kelas</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($siswa_ekstras as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->siswas->name) }}</td>
                                            <td>{{ $value->ekstras->ekstra }}</td>
                                            <td>{{ $value->siswas->rombel }}</td>
                                            <td>
                                                <a href="{{ url('/delSiswaEkstra/'.$value->id)}}">
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
