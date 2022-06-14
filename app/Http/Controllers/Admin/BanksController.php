<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BankActions;
use App\Library\Response;
use App\Models\Bank;
use Illuminate\Http\Request;

class BanksController extends Controller{
    use BankActions;

    function show(){
        $banks = Bank::paginate();
        return Response::view('admin.banks', [
            'banks' => $banks
        ]);
    }

    function refresh(){
        try {
            $this->setBanks();
            return Response::redirectBack('success', 'Bank List Refreshed');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
