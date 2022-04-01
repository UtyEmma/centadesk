<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller {

    function index(Request $request){
        return view('front.index', [
            'data' => $this->app_data($request)
        ]);
    }

}
