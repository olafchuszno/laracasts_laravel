<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // return a view with all of the posts (this was the playground)
    return view('posts', ['posts' => Post::all()]);
});

Route::get('posts', function() {
    // return a view with all of the posts
    return view('posts', ['posts' => Post::all()]);
});

Route::get('/posts/{post}', function ($slug) {

    // Find a post object by it's slug and pass it to the 'post' view. (If failed, Post throws an exception)
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);
    
});