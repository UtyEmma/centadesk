<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'course_id' ,'duration', 'current', 'class_link', 'attendees', 'price' ,'count', 'video', 'images'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_students' => 0,
        'current' => true,
        'status' => 'ongoing'
    ];

    public function students (){
        // return $this->hasMany('')
    }

}
