<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'user_id', 'mentor_id', 'course_id', 'batch_id', 'rating', 'review', 'status'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'status' => false
    ];

    public function publisher(){
        $this->belongsTo(User::class, 'user_id', 'unique_id');
    }

}
