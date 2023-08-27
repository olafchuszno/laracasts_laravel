<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    

    public function index()
    {
        // return the view with the posts
        return view('bookmarks.index', [
            'posts' => Post::all()->
                whereIn('id', Bookmark::select('post_id')->
                where('user_id', auth()->id())->
                get()->pluck('post_id')->toArray()
            )
        ]);
    }

    public function store(Post $post)
    {

        // restrict duplicate bookmarks with an error message
        if (count(Bookmark::select('*')->
            where('post_id', '=', $post->id)->
            where('user_id', '=', request()->user()->id)->
            get()
        )) {
            // The bookmark already exists, redirect the user back with a message
            return back()->with('failure', 'The bookmark already exists');
        }

        // associate the post' id with the user's id on the bookmarks table
        Bookmark::create([
            'user_id' => request()->user()->id,
            'post_id' => $post->id
        ]);

        return back()->with('success', "You've bookmarked the post");
    }

    public function destroy(Post $post)
    {
        ddd("Bookmarks index");
    }
}
