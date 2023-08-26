<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    

    public function index()
    {
        ddd("Bookmarks index");
    }

    public function store(Post $post)
    {
        // associate the post' id with the user's id on the bookmarks table

        Bookmark::create([
            'user_id' => request()->user()->id,
            'post_id' => $post->id
        ]);

        return back();
    }

    public function destroy()
    {
        ddd("Bookmarks index");
    }
}
