<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use Session;

class searchController extends Controller
{
    function getSearch(Request $request)
    {
        $api = $this->api();

        $rawSearch = $api->search($request->search, ['album', 'artist', 'track', 'playlist']);
        $search = [
            'playlist' => $rawSearch->playlists->items,
            'tracks' => $rawSearch->tracks->items,
            'albums' => $rawSearch->albums->items,
            'artists' => $rawSearch->artists->items,
        ];
        $search = (object)$search;
        session(['search' => $search]);

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
