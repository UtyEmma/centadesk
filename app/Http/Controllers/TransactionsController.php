<?php

namespace App\Http\Controllers;

use App\Library\Token;
use App\Models\Transaction;
use Illuminate\Http\Request;
use \App\Http\Controllers\EnrollmentController;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TransactionsController extends Controller
{
    public function create(Request $request){
        $unique_id = Token::unique('transactions');
        $reference = Token::random();

        $transaction = Transaction::create([
            'unique_id' => $unique_id,
            'reference' => $reference,
            'amount' => $request->amount,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    public function fetchBanks(){
        $base_url = env('RAVE_API_BASE_URL');
        $response = Http::withHeaders([
            'Authorization' => env('RAVE_SECRET_KEY')
        ])->get("$base_url/banks/NG");


        if($response->ok() && $response->status() === 200){
            $res = $response->json();

            return response()->json([
                "banks" => $res['data']
            ]);
        }

        return response()->json([], 400);
    }

    // public function verifyBankDetails(Request $request){
    //     $base_url = env('RAVE_API_BASE_URL');

    //     $response = Http::withHeaders([
    //         'Authorization' => env('RAVE_SECRET_KEY')
    //     ])->post("$base_url/accounts/resolve", $request->all(['account_bank', 'account_number']));

    //     if($response->ok() && $response->status() === 200){
    //         $res = $response->json();

    //         return response()->json([
    //             "acount_name" => $res['data']['account_name']
    //         ]);
    //     }

    //     return response()->json([
    //         'error' => $response->json()
    //     ], 400);

    // }

    function verifyBankDetails(Request $request){
        $base_url = env('PAYSTACK_BASE_URL');

        $response = Http::withHeaders([
            'Authorization' => "Bearer ".env('PAYSTACK_SECRET')
        ])->get("$base_url/bank/resolve", [
            'account_number' => $request->account_number,
            'bank_code' => $request->bank_code
        ]);

        if($response->ok() && $response->status() === 200){
            $res = $response->json();

            return response()->json([
                "account_name" => $res['data']['account_name'],
                "bank_id" => $res['data']['bank_id'],
                "account_number" => $res['data']['account_number']
            ]);
        }

        return response()->json([
            'error' => $response->json()
        ], 400);

    }

}
