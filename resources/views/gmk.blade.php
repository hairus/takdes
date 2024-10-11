@extends('app')

@section('content')
    <div class="container">
        <div class="modal fade" id="tesModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- header-->
                    <div class="modal-header">
                        <h5>Add Guru Mapel Kelas</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <!--body-->
                    <div class="modal-body">
                        <form action="/simpanGmk" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih guru</label>
                                <select name="guru" id="" class="select2" style="width: 100%" required>
                                    @foreach ($gurus as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Mapel</label>
                                <select name="mapel" id="" class="select2" style="width: 100%" required>
                                    @foreach ($mapels as $mapel)
                                        <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kelas</label>
                                <select name="kelas[]" id="" class="select2" multiple="multiple"
                                    style="width: 100%" required>
                                    @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
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

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Guru</h3>
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
                                    <th>Nama</th>
                                    <th>Mapel</th>
                                    <th>kelas</th>
                                    <th>ta</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($gmks as $key => $gmk)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($gmk->gurus->name) }}</td>
                                            <td>{{ $gmk->mapels->mapel }}</td>
                                            <td>{{ $gmk->kelas->kelas }}</td>
                                            <td>{{ $gmk->ta }}</td>
                                            <td>
                                                <a href="{{ url('/delGmk/'.$gmk->id)}}">
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
