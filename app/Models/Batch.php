<?php

namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Laravel\Scout\Searchable;

class Batch extends Model{
    use HasFactory, Searchable;

    protected $fillable = ['unique_id', 'course_id', 'mentor_id' ,'startdate', 'short_code', 'title', 'enddate', 'current', 'class_link', 'access_link', 'attendees', 'price' ,'count', 'video', 'desc', 'images', 'discount', 'fixed', 'percent', 'time_limit', 'signup_limit', 'certificates', 'currency', 'discount_price', 'excerpt', 'objectives', 'resources', 'category', 'tags'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_students' => 0,
        'current' => true,
        'status' => 'ongoing',
        'earnings' => 0,
        'paid' => false,
        'rating' => 1,
        'payable' => true
    ];

    protected $casts = [
        'price' => Currency::class,
        'discount_price'=> Currency::class
    ];

    public function toSearchableArray(){

        $index = [
            'unique_id' => $this->unique_id,
            'title' => $this->title,
        ];

        return $index;
    }

    public function course (){
        return $this->belongsTo(Courses::class, 'course_id', 'unique_id');
    }

    public function mentor (){
        return $this->belongsTo(User::class, 'mentor_id', 'unique_id');
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class, 'batch_id', 'unique_id');
    }

    public function resources(){
        return $this->hasMany(BatchResource::class, 'batch_id', 'unique_id');
    }

    function isOngoing(){
        return Date::parse($this->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($this->enddate)->greaterThanOrEqualTo(Date::now());
    }

    function isUpcoming(){
        return Date::parse($this->startdate)->greaterThan(Date::now());
    }

    function isCompleted(){
        return Date::parse($this->enddate)->lessThan(Date::now());
    }

}
