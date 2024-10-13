@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Tatib</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tesModal">
                            Add Guru Tatib
                        </button>
                        <div class="modal fade" id="tesModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('simpanGuruTatib') }}" method="post">
                                        @csrf
                                        <!-- header-->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Guru Tatib</h5>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <!--body-->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Pilih Guru</label>
                                                <select name="guru_id" id="" class="form-control select2"
                                                    style="width: 100%" required>
                                                    @foreach ($gurus as $value)
                                                        <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--footer-->
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($guruTatibs as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->gurus->name) }}</td>
                                            <td>
                                                <a href="{{ url('/deleteGuruTatib/' . $value->id) }}">
                                                    <button class="btn btn-sm btn-danger">Delete</button>
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
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Tatib</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addGuruTatibs">
                            Add Kelas Guru Tatib
                        </button>
                        <div class="modal fade" id="addGuruTatibs">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('simGuruKelasTatib') }}" method="post">
                                        @csrf
                                        <!-- header-->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Kelas Tatib</h5>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <!--body-->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Pilih Guru</label>
                                                <select name="guru_id" id="" class="form-control select2"
                                                    style="width: 100%" required>
                                                    @foreach ($guruTatibs as $value)
                                                        <option value="{{ $value->gurus->id }}"> {{ $value->gurus->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Kelas</label>
                                                <select name="kelas_id[]" id="" class="form-control select2" multiple="multiple"
                                                    style="width: 100%" required>
                                                    @foreach ($kelas as $value)
                                                        <option value="{{ $value->id }}"> {{ $value->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--footer-->
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="gkt">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($gkts as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->gurus->name) }}</td>
                                            <td>{{ strtoupper($value->kelas->kelas) }}</td>
                                            <td>
                                                <a href="{{ url('/delgkt/' . $value->id) }}">
                                                    <button class="btn btn-sm btn-danger">Delete</button>
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
            $('#gkt').DataTable();
            $('.select2').select2();
        });
    </script>
@endsection
