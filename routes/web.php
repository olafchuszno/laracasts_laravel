<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

    // return a view with all of the posts and their categories
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
})->name('home');



Route::get('posts', function() {
    // return a view with all of the posts and their categories
    return view('posts', [
        'posts' => Post::all(),
        'categories' => Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    // Find a post object by it's slug and pass it to the 'post' view. 
    // (If failed, Post throws an exception)
    return view('post', [
        'post' => $post
    ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('/authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts
    ]);
});
