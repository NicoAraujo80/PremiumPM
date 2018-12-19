{!! Form::open(['route' => 'getSearch', 'method' => 'get']) !!}
<br>
<div class="col-sm-8 offset-2">
    {!! Form::text('search', '', ['class' => 'form-control']) !!}
    <br>
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary btn-lg']) !!}
</div>
{!! Form::close() !!}

@if (isset($search))
    <div class="col-md-8 offset-2">
        <h1 style="color: #dae0e5;">Songs:</h1>
        @foreach ($search->tracks as $track)
            <div class="row">
                @if (isset($tracks))
                    <a class="col-sm-1" style="padding: 0px;" href="{{ route('putSong', [$tracks->playlistId , $track->id]) }}">
                        <img style="float: right; display: block; width: 50%;" src="https://cdn3.iconfinder.com/data/icons/buttons/512/Icon_11-512.png"/>
                    </a>
                @endif
                <h6 class="col-sm-9"  style="padding-left: 10px; color: #e9ecef;">{{ $track->name . " By: " . $track->artists[0]->name }}</h6>
            </div>
        @endforeach
    </div>
@endif

