<?php

namespace App\Http\Controllers;

use SpotifyWebAPI;
use Session;

class indexController extends Controller
{
    function getIndex()
    {
        $search = session('search');
        $tracks = session('tracks');
        $play = $this->getPlayInfo();

        if (isset($tracks)) {
            if (isset($search)) {
                return view('index.index')->withTracks($tracks)->withSearch($search)->withPlay($play);
            } else {
                return view('index.index')->withTracks($tracks)->withPlay($play);
            }
        } else {
            $playlists = session('playlists');
            if (!isset($playlists)) {
                return redirect()->route('getPlaylists');
            }

            if (isset($search)) {
                return view('index.index')->withPlaylists($playlists)->withSearch($search)->withPlay($play);
            } else {
                return view('index.index')->withPlaylists($playlists)->withPlay($play);
            }
        }
    }

    function getPlayInfo()
    {
        $api = $this->api();

        $play = $api->getMyCurrentPlaybackInfo();

        return $play;

    }

    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
