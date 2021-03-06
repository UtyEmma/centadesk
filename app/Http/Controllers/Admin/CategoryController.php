<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Library\Token;
use App\Models\Category;
use App\Models\CategorySuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller{

    function fetchAll (Request $request){
        $categories = Category::paginate(env('ADMIN_PAGINATION_COUNT'));
        return Response::view('admin.categories', [
            'categories' => $categories
        ]);
    }

    function create (Request $request){
        try {
            $unique_id = Token::unique('categories');
            $slug = Str::slug($request->name);

            $category = Category::create([
                'unique_id' => $unique_id,
                'name' => $request->name,
                'slug' => $slug
            ]);

            return Response::redirectBack('success', 'Category Created Successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }

    function update(Request $request, $category_id){
        try {
            $slug = Str::slug($request->name);

            $category = Category::find($category_id);
            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();

            return Response::redirectBack('success', 'Category Created Successfully');
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }

    function setStatus (Request $request, $category_id){
        try {
            $category = Category::find($category_id);
            $category->status = !$request->status;
            $category->save();

            $message = $category->status ? 'Enabled' : 'Disabled';
            return Response::redirectBack('success', "Category $message Successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }

    function delete($category_id){
        try {
            $category = Category::where('unique_id', $category_id)->first();
            $category->delete();
            return Response::redirectBack('success', "Category Deleted Successfully");
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }

    function suggestions () {
        try {
            $suggestions = CategorySuggestion::all();
            return Response::view('admin.category-suggestions', [
                'suggestions' => $suggestions
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }

    function updateSuggestions(Request $request, $id){
        try {
            $suggestion = CategorySuggestion::where('unique_id', $id)->first();

            if($request->action === 'accept') {
                $unique_id = Token::unique('categories');
                $slug = Str::slug($suggestion->title);

                $category = Category::create([
                    'unique_id' => $unique_id,
                    'name' => $suggestion->title,
                    'slug' => $slug
                ]);

                $suggestion->delete();
                return Response::redirectBack('success', "Category Added to Active Categories");
            }else{
                $suggestion->delete();
                return Response::redirectBack('success', "Category Suggestion Deleted");
            }
        } catch (\Throwable $th) {
            return Response::redirectBack('error',  $th->getMessage());
        }
    }
}
