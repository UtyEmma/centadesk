<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Courses extends Model{
    use HasFactory, Searchable;

    public $asYouType = true;

    protected $fillable = ['unique_id', 'mentor_id', 'name', 'slug', 'desc', 'tags', 'video', 'images', 'total_batches', 'total_students', 'active_batch', 'status','currency', 'category'];

    protected $primaryKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'total_batches' => 0,
        'total_students' => 0,
        'revenue' => 0,
        'rating' => 1,
        'reviews' => 0,
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
        return $this->belongsTo(User::class, 'user_id', 'unique_id');
    }

    public function batches(){
        return $this->hasMany(Batch::class, 'course_id', 'unique_id');
    }

    public function allReviews(){
        return $this->hasMany(Review::class, 'course_id', 'unique_id');
    }


}
