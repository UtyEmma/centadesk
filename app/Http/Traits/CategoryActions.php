<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Courses;

trait CategoryActions {

    function getActiveCategories(){
        return Category::where('status', true)
                        ->where('courses', '>', 0)
                        ->whereRelation('getCourses', 'total_batches', '>', 0)
                        ->withCount('getCourses')
                        ->get();
    }

    function getTopCategories(){
        return $this->getActiveCategories()
                    ->sortByDesc('courses')
                    ->take(6)
                    ->sortByDesc('name');
    }

}
