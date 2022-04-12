<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'batch_id', 'student_id' , 'message', 'status'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'status' => 'pending'
    ];
}
