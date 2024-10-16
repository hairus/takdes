@extends('app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div style="text-align: center">
                <p>masih dalam pengerjaan</p>
                <p>biar tidak panik musik.... dulu gk sih....💃</p>
            </div>
            <div class="card">
                <div class="col justify-content-center" style="display: flex">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ET5vIGJiUmI?si=c0ccJyjJWaqen4Ei&amp;start=86" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">

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
