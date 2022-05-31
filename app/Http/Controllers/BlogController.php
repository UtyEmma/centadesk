<?php

namespace App\Http\Controllers;

use App\Library\Response;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller {

    function all (){
        $posts = Blog::where('status', true)->orderBy('date', 'desc')->paginate(env('PAGINATION_COUNT'));
        return Response::view('front.blog', [
            'posts' => $posts
        ]);
    }

    function show($slug){
        if(!$post = Blog::where('status', true)->where('slug', $slug)->first())
                                    return Response::view('errors.404');

        return Response::view('front.blog-details', [
            'post' => $post
        ]);
    }

}
