<?php

namespace App\Http\Controllers;

use Facades\App\Helpers\Json;

class ItunesController extends Controller
{
    public function index()
    {
        $songs = file_get_contents("https://rss.itunes.apple.com/api/v1/be/apple-music/top-songs/all/12/explicit.json");
        $songs= json_decode($songs);
        $songs= $songs->feed;
        // Remove attributes you don't need for the view
        unset($songs->author,$songs->links,
            $songs->copyright,$songs->icon,
            $songs->id);

        $result = compact('songs');
        Json::dump($result);
        return view('itunes.index',$result);
    }
}
