<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        // Merge the form attributes with the dynamic ones (and view_count)
        // Create the post with those attributes 
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            'view_count' => 0
        ]));

        return redirect('/')->with('success', 'Your Post Was Created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'authors' => User::all()
        ]);
    }

    public function update(Post $post)
    {
        // Validate the admin's input and store it in attributes variable
        $attributes = $this->validatePost($post);

        // If a thumbnail was uploaded, append it to the attributes and store it
        if (request('thumbnail') ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        // Update the post
        $post->update($attributes);

        // Redirect back with a message
        return back()->with('success', 'Post Updated!');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return back()->with('success', 'Post Deleted!');
    }


    protected function validatePost (?Post $post = null): array
    {
       $post ??= new Post();

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        return $attributes;
    }

}

