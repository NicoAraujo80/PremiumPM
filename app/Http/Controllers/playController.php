<?php

namespace App\Http\Controllers;

use SpotifyWebAPI;
use Session;

class playController extends Controller
{
    function playTrack()
    {
        $api = $this->api();
        dd($api->getMyCurrentPlaybackInfo());
        dd($api->getMyDevices());
    }

    function test()
    {
        $session = session('spotify');
        $token = $session->getAccessToken();


        return view('test')->withToken($token);
    }

    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
