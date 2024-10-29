@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Mapel Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tesModal">
                            Add
                        </button>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#copy">
                            Clone Mapel
                        </button>
                        <div class="modal fade" id="tesModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- header-->
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <!--body-->
                                    <div class="modal-body">
                                        <form action="{{ url('/simpanMapelKelas') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Pilih Mapel</label>
                                                <select name="mapel[]" id="" class="select2" multiple="multiple"
                                                    style="width: 100%" required>
                                                    @foreach ($mapels as $mapel)
                                                        <option value="{{ $mapel->id }}">{{ $mapel->mapel }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pilih Kelas</label>
                                                <select name="kelas" id="" class="select2" style="width: 100%"
                                                    required>
                                                    @foreach ($kelas as $kls)
                                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <!--footer-->
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="copy">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- header-->
                                    <div class="modal-header">
                                        <p>Cloning Mapel</p>
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <!--body-->
                                    <div class="modal-body">
                                        <form action="{{ url('/copyMapel') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Pilih Kelas Utama</label>
                                                <select name="kelas_id" id="" class="form-control"
                                                        style="width: 100%" required>
                                                    @foreach ($kelas as $kls)
                                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pilih Kelas Second</label>
                                                <select name="kelas" id="" class="form-control" style="width: 100%"
                                                        required>
                                                    @foreach ($kelas as $kls)
                                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <!--footer-->
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-info" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>semester</th>
                                    <th>Ta</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($mapel_kelas as $key => $mapel)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($mapel->mapels->mapel) }}</td>
                                            <td>{{ strtoupper($mapel->kelas->kelas) }}</td>
                                            <td>{{ $mapel->tas->semester }}</td>
                                            <td>{{ $mapel->tas->ta }}</td>
                                            <td>
                                                <a href="{{ url('/delMapelKelas/'.$mapel->id)}}">
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
            $('.select2').select2();
        });
    </script>
@endsection
