@extends('app')

@section('content')
    <div class="container">
        <div class="modal fade" id="tesModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- header-->
                    <div class="modal-header">
                        <h5>Add Ekstrakulikuer</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <!--body-->
                    <div class="modal-body">
                        <form action="/simpanEkstra" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Create Ekstra</label>
                                <input type="text" name="ekstra" class="form-control" required>
                            </div>
                    </div>
                    <!--footer-->
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Management Ekstrakulikuler</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tesModal">
                            Add
                        </button>
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Ekstrakulikuler</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($ektras as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->ekstra) }}</td>
                                            <td>
                                                <a href="{{ url('/delEkstra/' . $value->id) }}">
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
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Management Guru Ekstra</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="modal fade" id="testModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- header-->
                                    <div class="modal-header">
                                        <h5>Add Guru Ekstrakulikuer</h5>
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <!--body-->
                                    <div class="modal-body">
                                        <form action="/simpanGuruEkstra" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Pilih Guru</label>
                                                <select name="guru_id" id="" style="width: 100%" class="form-control select2" required>
                                                    @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pilih Ekstrakulikuler</label>
                                                <select name="ekstra_id" style="width: 100%" class="form-control select2" required>
                                                    @foreach ($ektras as $ekstra)
                                                    <option value="{{ $ekstra->id }}">{{ $ekstra->ekstra }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <!--footer-->
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#testModal1">
                            Add Guru Ekstra
                        </button>
                        <div class="table-responsive">
                            <table class="table" id="ekstra">
                                <thead>
                                    <th>No</th>
                                    <th>Guru</th>
                                    <th>Ekstra</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($guruEkstras as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->gurus->name) }}</td>
                                            <td>{{ strtoupper($value->ekstras->ekstra) }}</td>
                                            <td>
                                                <a href="{{ url('/delGuruEkstra/' . $value->id) }}">
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
            $('#ekstra').DataTable();
            $('.select2').select2();
        });
    </script>
@endsection
