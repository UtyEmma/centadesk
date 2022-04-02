<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'course_id' ,'startdate', 'short_code', 'title', 'enddate', 'current', 'class_link', 'attendees', 'price' ,'count', 'video', 'images', 'discount', 'fixed', 'percent', 'time_limit', 'signup_limit', 'currency'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_students' => 0,
        'current' => true,
        'status' => 'ongoing'
    ];

    public function course (){
        return $this->belongsTo(Courses::class, 'course_id', 'unique_id');
    }

}
