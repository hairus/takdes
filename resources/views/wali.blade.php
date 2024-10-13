@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Management Wali</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tesModal">
                            Add Wali
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
                                        <form action="{{ url('simpanWali')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Pilih guru</label>
                                                <select name="guru_id" id="" class="select2" style="width: 100%"
                                                    required>
                                                    @foreach ($gurus as $guru)
                                                        <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pilih Kelas</label>
                                                <select name="kelas_id" id="" class="select2" style="width: 100%"
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
                                        <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table" id="siswas">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Kelas</th>
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>#</th>
                                </thead>
                                <tbody>
                                    @foreach ($walis as $key => $siswa)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($siswa->guru->name) }}</td>
                                            <td>{{ $siswa->guru->nip }}</td>
                                            <td>{{ $siswa->kelas->kelas }}</td>
                                            <td>{{ $siswa->tas->ta }}</td>
                                            <td>{{ $siswa->tas->semester }}</td>
                                            <td>
                                                <a href="{{ url('/delWali/'.$siswa->id)}}">
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
