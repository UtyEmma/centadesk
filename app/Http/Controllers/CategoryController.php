<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySuggestionRequest;
use App\Library\Response;
use App\Library\Token;
use App\Models\Category;
use App\Models\CategorySuggestion;
use Illuminate\Http\Request;

class CategoryController extends Controller{


    function suggestCategory(CategorySuggestionRequest $request){
        try {
            $unique_id = Token::unique('category_suggestions');
            if(Category::where('name', $request->title)->first()) return Response::redirectBack('error', 'The suggested category already exists!');
            // Send an alert to admins
            // Send Alert to User
            CategorySuggestion::create(array_merge($request->validated(), ['unique_id' => $unique_id]));
            return Response::redirectBack('success', 'Your Suggestion has been sent!');
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

}
