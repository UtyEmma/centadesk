<?php

namespace Database\Seeders;

use App\Library\Token;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder{

    protected $categories = [
        'Personal Development', 'Information Technology', 'Computer Science', 'Web Development', 'Business', 'Social Science',
        'Software Engineering', 'Leadership', 'Education', 'Cryptocurrency', 'Marketing', 'UI/UX Design', 'Photography', 'Politics',
        'History', 'Language', 'Neuroscience', 'Freelancing', 'Product Management', 'Blockchain', 'Climate Change', 'Mobile Development',
        'Game Development', 'Entrepreneurship', 'Human Resources'
    ];

    function __construct(){
        return $this->run();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        foreach ($this->categories as $value) {
            $unique_id = Token::unique('categories');
            $slug = Str::slug($value);

            Category::updateOrCreate([
                'name' => $value,
                'slug' => $slug
            ], [
                'unique_id' => $unique_id,
                'name' => $value,
                'slug' => $slug,
            ]);
        }
    }
}
