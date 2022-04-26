<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Courses;

trait CategoryActions {

    function getActiveCategories(){
        return Category::where('status', true)->get();
    }

    function getTopCategories(){
        return $this->getActiveCategories()->sortByDesc('courses')->take(7)->sortByDesc('name');
    }
}
