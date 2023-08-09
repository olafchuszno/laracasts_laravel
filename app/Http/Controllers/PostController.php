<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        // return a view with all of the posts and their categories
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Post $post)
    {
        // Find a post object by it's slug and pass it to the 'post' view. 
        // (If failed, Post throws an exception)
        return view('post', [
            'post' => $post
        ]);
    }
    
}