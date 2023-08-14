<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        // Validate the comment's body
        request()->validate([
            'body' => 'required'
        ]);

        
        // add a comment to the given post
        $post->comments()->create([
            'body' => request('body'),
            'user_id' => request()->user()->id
        ]);

        return back();
        
    }
}
