<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'slug', 'courses', 'status', 'students'];

    protected $primayKey = 'unique_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $attributes = [
        'courses' => 0,
        'students' => 0,
        'status' => true
    ];

    function getCourses (){
        return $this->hasMany(Courses::class, 'category', 'slug');
    }

}
