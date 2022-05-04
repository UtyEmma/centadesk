<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\Bank;
use Illuminate\Http\Request;

class BanksController extends Controller{

    function show(Request $request){
        $banks = Bank::paginate();
        return Response::view('admin.banks', [
            'banks' => $banks
        ]);
    }

    function refresh(Request $request){
        return Response::redirectBack('success', 'Bank List Refreshed');
    }
}
