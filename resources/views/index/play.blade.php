<div style="position: absolute; top: 85%; height: 15%; width: 100%; margin-bottom: 1%; background-color: silver;">
    <div>
        <h2 style="text-align: center;">{{ $play->item->name }}</h2>
        <div style="margin: auto;" class="row">
            @for ($i = 0; $i < count($play->item->artists); $i++)
                @if (count($play->item->artists) != $i + 1)
                    <h4 style="color: darkslategrey; text-align: center; padding-right: .5em;">{{ $play->item->artists[$i]->name }},</h4>
                @else
                    <h4 style="color: darkslategrey; text-align: center;">{{ $play->item->artists[$i]->name }}</h4>
                @endif
            @endfor
        </div>
        <div style="margin: auto; width: 600px;">
            <input style="width: 100%;" type="range" min="0" max="{{$play->item->duration_ms}}" value="{{$play->progress_ms}}">
        </div>
    </div>
</div>
