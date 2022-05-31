<?php

namespace Database\Seeders;

use App\Library\Str;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder{

    function __construct(){
        $blogService = new BlogService();
        return $this->run($blogService);
    }

    public function run(BlogService $blogService){
        $posts = $blogService->posts();
        $blog = Blog::all();

        foreach ($posts['items'] as $key => $post) {
            $postIsEmpty = $blog->where('title', $post['title'])->isEmpty();
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
    }
}
