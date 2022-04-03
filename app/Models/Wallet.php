<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model{
    use HasFactory;
    protected $fillable = ['unique_id', 'user_id', 'balance', 'escrow', 'available', 'earnings', 'referrals', 'withdrawals', 'deposits'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'balance' => 0,
        'escrow' => 0,
        'available' => 0,
        'earnings' => 0,
        'referrals' => 0,
        'withdrawals' => 0,
        'deposits' => 0
    ];

}
