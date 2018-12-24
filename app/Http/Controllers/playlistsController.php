<?php

namespace App\Http\Controllers;

use SpotifyWebAPI;
use Session;

class playlistsController extends Controller
{
    function backToPlaylists()
    {
        session()->forget('tracks');
        return redirect()->route('index');
    }

    function getTracks($playlistId)
    {
        $api = $this->api();

        $playlist = $api->getPlaylist($playlistId);

        $playlistName = $playlist->name;

        $tracks = $api->getPlaylistTracks($playlistId);
        $tracks = (array)$tracks;
        $tracks["playlistName"] = $playlistName;
        $tracks["playlistId"] = $playlistId;
        $tracks = (object)$tracks;
        session(['tracks' => $tracks]);

        return redirect()->route('index');
    }


    function getPlaylists()
    {
        $api = $this->api();

        $playlists = $api->getUserPlaylists($api->me()->id, ['limit' => 20]);
        $myPlaylists = [];
        foreach ($playlists->items as $playlist) {
            if ($playlist->owner->id == $api->me()->id) {
                array_push($myPlaylists, $playlist);
            }
        }
        session(['playlists' => $myPlaylists]);

        return redirect()->route('index');
    }


    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
