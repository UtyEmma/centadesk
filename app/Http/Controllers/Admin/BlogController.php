<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Library\Str;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller{

    function createPosts(BlogService $blogService){
        try {
            $posts = $blogService->posts();
            $blog = Blog::all();

            foreach ($posts['items'] as $key => $post) {
                $postIsEmpty = $blog->where('title', $post['title'])->isEmpty();

                // dd($post);
                // dd($posts['feed']['image']);
                if($postIsEmpty){
                    Blog::create([
                        'title' => $post['title'],
                        'date' => $post['pubDate'],
                        'slug' => Str::slug($post['title']),
                        'author' => $post['author'],
                        'description' => $post['description'],
                        'thumbnail' => $post['thumbnail'],
                        'categories' => $post['categories'],
                        'content' => $post['content'],
                        'medium_link' => $post["link"],
                        'authorImage' => $posts['feed']['image']
                    ]);
                }
            }

            return Response::redirectBack('success', "Blog Posts Updated");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }

    function all(){
        try {
            $posts = Blog::paginate(env('ADMIN_PAGINATION_COUNT'));
            return Response::view('admin.blog', [
                'posts' => $posts
            ]);
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
