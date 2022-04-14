<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'code'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';

    public $incrementing = false;

}
