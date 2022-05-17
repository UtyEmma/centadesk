<?php

namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'user_id', 'type', 'reference', 'status', 'amount', 'currency', 'batch_id'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'status' => 'pending'
    ];

    protected $casts = [
        'amount' => Currency::class,
    ];

}
