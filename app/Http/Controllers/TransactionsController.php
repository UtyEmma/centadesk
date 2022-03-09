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

}
