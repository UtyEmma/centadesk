<?php

namespace App\Services;

use App\Library\Arr;
use Illuminate\Support\Facades\Http;

class BlogService {

    function posts(){
        $username = env('MEDIUM_USERNAME');
        $mediumFeed = env('MEDIUM_FEED');
        $url = env('MEDIUM_RSS_LINK');

        $response = Http::get($url, [
            'rss_url' => $mediumFeed,
            'rss' => $mediumFeed
        ]);

        $data = $response->json();
        return $response->ok() && $data['status'] === 'ok' ? $data : [];
    }

}

