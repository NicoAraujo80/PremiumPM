<?php

namespace App\Http\Controllers;


use Session;

class indexController extends Controller
{
    function getIndex()
    {
        $search = session('search');
        $tracks = session('tracks');

        if (isset($tracks)) {
            if (isset($search)) {
                return view('index.index')->withTracks($tracks)->withSearch($search);
            } else {
                return view('index.index')->withTracks($tracks);
            }
        } else {
            $playlists = session('playlists');
            if (!isset($playlists)) {
                return redirect()->route('getPlaylists');
            }

            if (isset($search)) {
                return view('index.index')->withPlaylists($playlists)->withSearch($search);
            } else {
                return view('index.index')->withPlaylists($playlists);
            }
        }
    }
}
