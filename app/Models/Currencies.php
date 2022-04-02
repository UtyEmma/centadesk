<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'symbol', 'rate', 'base'];
    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'base' => false
    ];
}
