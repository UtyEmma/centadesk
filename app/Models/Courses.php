<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Laravel\Scout\Searchable;

class Courses extends Model{
    use HasFactory, SoftDeletes;

    public $asYouType = true;

    protected $fillable = ['unique_id', 'mentor_id', 'name', 'slug',  'total_batches', 'total_students', 'status', 'category'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_batches' => 0,
        'total_students' => 0,
        'rating' => 1,
        'status' => 'published'
    ];

    public function toSearchableArray(){

        $index = [
            'unique_id' => $this->unique_id,
            'name' => $this->name,
            'category' => $this->category
        ];

        return $index;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'unique_id');
    }

    public function mentor(){
        return $this->belongsTo(User::class, 'mentor_id', 'unique_id');
    }

    public function batches(){
        return $this->hasMany(Batch::class, 'course_id', 'unique_id');
    }

    public function allReviews(){
        return $this->hasMany(Review::class, 'course_id', 'unique_id');
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class, 'course_id', 'unique_id');
    }


}
