@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <div class="card-header">
                            <h3>Profile Guru</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><h6>Name : {{ auth()->user()->name }}</h6></li>
                            <li><h6>Role : {{ auth()->user()->role }}</h6></li>
                        </ul>
                        <span>
                            <p>Guru Mapel</p>
                            <ul>
                                @foreach ($gm as $g)
                                <li>{{ $g->mapels->mapel }}</li>
                                @endforeach
                            </ul>
                        </span>
                        <span>
                            <p>Guru kelas</p>
                            <ul>
                                @foreach ($gk as $k)
                                <li>{{ $k->kelas->kelas }}</li>
                                @endforeach
                            </ul>
                        </span>
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
        });
    </script>
@endsection
