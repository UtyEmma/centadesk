<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'user_id', 'balance', 'earnings_balance', 'refferal_balance', 'withdrawals', 'deposits'];
}
