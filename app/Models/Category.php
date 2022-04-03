<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'slug', 'courses'];

    protected $primayKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

}
