<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use Session;

class songsController extends Controller
{
    function putSong($playlistId, $trackId)
    {
        $api = $this->api();

        $api->addPlaylistTracks($playlistId, [$trackId]);

        return redirect()->route('getPlaylist', $playlistId);
    }


    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
