<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'user_id', 'amount', 'account_no', 'account_name', 'bank', 'type', 'wallet_key', 'reference', 'status', 'currency'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'status' => 'pending' //pending - inprogress - successful
    ];


}
