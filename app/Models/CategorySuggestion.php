<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySuggestion extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'title', 'description'];

    protected $primayKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;
}
