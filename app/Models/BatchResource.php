<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchResource extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'link', 'description', 'title', 'batch_id'];

    protected $primayKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'status' => true
    ];


}
