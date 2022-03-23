<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'course_id' ,'startdate', 'short_code', 'title', 'enddate', 'current', 'class_link', 'attendees', 'price' ,'count', 'video', 'images', 'discounts', 'time_discount', 'time_discount_rate', 'time_discount_price', 'time_discount_percentage', 'signups_discount', 'signups_discount_rate', 'signups_discount_price', 'signups_discount_percentage'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_students' => 0,
        'current' => true,
        'status' => 'ongoing'
    ];

}
