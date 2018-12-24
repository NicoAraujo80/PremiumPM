<?php

namespace App\Http\Controllers;

use SpotifyWebAPI;
use Session;

class loginController extends Controller
{
    function login()
    {
        $session = new SpotifyWebAPI\Session(
            'a03acd386557496ab1431f8744fe0698',
            '5b8ba1449c2a4b6bbb26e25f15d58071',
            'http://127.0.0.1:8000/callback/'
        );

        $options = [
            'scope' => [
                'user-read-email',
                'playlist-modify-private',
                'playlist-modify-public',
                'user-read-playback-state',
            ],
        ];

        header('Location: ' . $session->getAuthorizeUrl($options));
        exit();
    }

    function callback()
    {
        $session = new SpotifyWebAPI\Session(
            'a03acd386557496ab1431f8744fe0698',
            '5b8ba1449c2a4b6bbb26e25f15d58071',
            'http://127.0.0.1:8000/callback/'
        );
        $session->requestAccessToken($_GET['code']);
        $session->getRefreshToken();

        session(['spotify' => $session]);

        return redirect()->route('index');
    }
}
