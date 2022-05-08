<?php

namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'course_id', 'mentor_id' ,'startdate', 'short_code', 'title', 'enddate', 'current', 'class_link', 'access_link', 'attendees', 'price' ,'count', 'video', 'desc', 'images', 'discount', 'fixed', 'percent', 'time_limit', 'signup_limit', 'currency', 'discount_price', 'excerpt', 'objectives'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_students' => 0,
        'current' => true,
        'status' => 'ongoing',
        'earnings' => 0,
        'paid' => false,
        'payable' => true
    ];

    protected $casts = [
        'price' => Currency::class,
        'discount_price'=> Currency::class
    ];

    public function course (){
        return $this->belongsTo(Courses::class, 'course_id', 'unique_id');
    }

}
