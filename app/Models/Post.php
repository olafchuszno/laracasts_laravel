<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // These are the statements (below) that I used for this lesson so you guys don't have to type them yourselves

    /* to create the family post:

        Post::create([
        'title' => 'My Family Post',
        'excerpt' => 'Excerpt for my post',
        'body' => 'Lorem ipsum dolar sit amet.',
        'slug' => 'my-family-post',
        'category_id' => 1
        ]);
    */

    /* to create the work post:

        Post::create([
        'title' => 'My Work Post',
        'excerpt' => 'Excerpt for my post',
        'body' => 'Lorem ipsum dolar sit amet.',
        'slug' => 'my-work-post',
        'category_id' => 2
        ]);
    

    /* to create the hobby post:

        Post::create([
        'title' => 'My Hobby Post',
        'excerpt' => 'Excerpt for my post',
        'body' => 'Lorem ipsum dolar sit amet.',
        'slug' => 'my-hobby-post',
        'category_id' => 3
        ]);
    */


    /* to re-do the categories table if you need to
        INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
        (1, 'Personal', 'personal', '2023-08-02 14:58:17', '2023-08-02 14:58:17'),
        (2, 'Work', 'work', '2023-08-02 14:59:49', '2023-08-02 14:59:49'),
        (3, 'Hobbies', 'hobbies', '2023-08-02 15:00:28', '2023-08-02 15:00:28'); 
    */

}
