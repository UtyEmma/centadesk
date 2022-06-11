<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Courses;

trait CategoryActions {

    function getActiveCategories(){
        return Category::where('status', true)
                        ->has('batches')
                        ->withCount('batches')
                        ->get();
    }

    function getAllCategories(){
        return Category::where('status', true)
                        ->withCount('batches')
                        ->get();
    }

    function getTopCategories(){
        return $this->getActiveCategories()
                    ->sortByDesc('courses')
                    ->take(6)
                    ->sortByDesc('name');
    }

}
