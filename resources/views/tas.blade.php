@extends('app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addTa">
                        Add TA
                    </button>
                    <div class="table table-responsive">
                        <table class="table table-bordered table-success" id="tas">
                            <thead>
                            <th>No</th>
                            <th>Ta</th>
                            <th>Semester</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($tas as $key => $ta)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $ta->ta }}</td>
                                    <td>{{ $ta->semester }}</td>
                                    <td>
                                        @if($ta->aktif == 1)
                                            <a href="{{ url('/ta/aktif/'.$ta->id) }}">
                                                <button class="btn btn-sm btn-success">
                                                    <i class="fa fa-check"></i> Aktif
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ url('/ta/aktif/'.$ta->id) }}">
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-ban"></i> Tidak Aktif
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--        modal --}}
        <div class="modal fade" id="addTa">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- header-->
                    <div class="modal-header">
                        <h5>Add Tahun Ajaran</h5>
                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <!--body-->
                    <div class="modal-body">
                        <form action="/simpanTa" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Tahun Ajaran</label>
                                <input name="ta" type="text" class="form-control" required>

                            </div>
                            <div class="form-group">
                                <label for="">Input Semester</label>
                                <input name="smt" type="text" class="form-control">
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
        <hr>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tas').DataTable();
            $('#gkt').DataTable();
            $('.select2').select2();
        });
    </script>
@endsection
