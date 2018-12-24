<?php

namespace App\Http\Controllers;

use SpotifyWebAPI;
use Session;

class songsController extends Controller
{
    function putTrack($playlistId, $trackId)
    {
        $api = $this->api();
        $api->addPlaylistTracks($playlistId, [$trackId]);

        return redirect()->route('getTracks', $playlistId);
    }

    function deleteTrack($playlistId, $trackId)
    {
        $api = $this->api();
        $api->deletePlaylistTracks($playlistId, [['id' => $trackId]]);

        return redirect()->route('getTracks', $playlistId);
    }


    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
