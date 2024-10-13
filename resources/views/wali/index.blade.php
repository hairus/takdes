@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h5>Wali Kelas {{ auth()->user()->walis->kelas->kelas }}</h5>
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
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($siswas as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($value->name) }}</td>
                                            <td>{{ $value->rombel }}</td>
                                            <td>{{ $ta->ta }}</td>
                                            <td>{{ $ta->semester }}</td>
                                            <td>
                                                <a href="{{ url('cetak/'.$value->id)}}" target="_blank">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-print"></i>
                                                    </button>
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
