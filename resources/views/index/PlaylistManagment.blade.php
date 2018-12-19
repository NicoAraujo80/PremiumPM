<div style="background-color: #3d4852">
    <div class="row">
        <div class="col-sm-1">
            <a href="{{ route('backToPlaylists') }}">
                <img style="width: 100%;" src="https://img.icons8.com/ios/1600/back.png"/>
            </a>
        </div>
        <div class="col-sm-8 offset-1">
            @if (isset($playlists))
                <h1 style="text-align: center;">Playlists</h1>
            @elseif (isset($tracks))
                <h1 style="text-align: center;">{{ $tracks->playlistName }}</h1>
            @endif

        </div>
    </div>
</div>


<div class="col-sm-10 offset-1" style="height: 100%; overflow-y: scroll;">
    @if (isset($playlists))
        @for ($i = 0; $i < count($playlists); $i++)
            @if ($i % 3 == 0) <div class="row"> @endif
                <div class="col-sm-4">
                    <a href="{{ route('getPlaylist', [$playlists[$i]->id]) }}">
                        <img style="width: 100%;" src="{{ $playlists[$i]->images[0]->url }}"/>
                        <h1 style="color: #38c172;">{{ $playlists[$i]->name }}</h1>
                    </a>
                </div>
            @if ($i % 3 == 2 || $i == count($playlists) - 1)</div>@endif
        @endfor
    @endif

    @if (isset($tracks))
        @for ($i = 0; $i < count($tracks->items); $i++)
            <h1 style="color: #38c172;">{{ $i + 1 . ". " . $tracks->items[$i]->track->name }}</h1>
        @endfor
    @endif
</div>


