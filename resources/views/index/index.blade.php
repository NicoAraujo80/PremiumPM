@extends('main')

@section('content')
    <div class="row" style="height: 100vh; overflow: hidden;">
        <div class="col-md-7" style="background-color: #1b1e21;">
            @include('index.PlaylistManagment')
        </div>

        <div class="col-md-5" style="background-color: #000000;">
            @include('index.search')
        </div>
    </div>
    @include('index.play')
@stop
