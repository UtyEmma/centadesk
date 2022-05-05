<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use Illuminate\Http\Request;

class AnalyticsController extends Controller{


    function all(){
        return Response::view('admin.analytics');
    }

}
