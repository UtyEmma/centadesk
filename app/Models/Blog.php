<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    use HasFactory;

    protected $fillable = ['title', 'date', 'slug', 'author', 'description', 'thumbnail', 'categories', 'content' , 'medium_link', 'authorImage', 'status'];

    protected $attributes = [
        'status' => true
    ];

    protected $casts = [
        'categories' => Json::class
    ];


}
