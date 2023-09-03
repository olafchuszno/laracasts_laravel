<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function index()
    {
        $sortby = null;

        if (request('sortby') == 'popularity') {
            $sortby = 'view_count';
        }

        // return a view with all of the posts and their categories
        return view('posts.index', [
            'posts' => Post::latest($sortby)->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        // Increment the view_count by 1
        $post->update([
            'view_count' => $post->view_count + 1
        ]);

        // Find a post object by it's slug and pass it to the 'post' view. 
        // (If failed, Post throws an exception)
        return view('posts.show', [
            'post' => $post
        ]);
    }
    
}
