<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use Session;

class ajaxController extends Controller
{
    function test()
    {
        $api = $this->api();
        $play = $api->getMyCurrentPlaybackInfo();
        return response()->json(array('msg'=> $play), 200);
    }

    function api()
    {
        $session = Session::get('spotify', 'default');
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($session->getAccessToken());
        return $api;
    }
}
