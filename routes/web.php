<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('bookmarks', [BookmarkController::class, 'index'])->middleware('auth');
Route::post('posts/{post:slug}/bookmarks', [BookmarkController::class, 'store'])->middleware('auth');
Route::delete('bookmarks/{post:id}', [BookmarkController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::patch('profile', [ProfileController::class, 'update'])->middleware('auth');


// Admin
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    // Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    // Route::post('admin/posts', [AdminPostController::class, 'store']);

    // Route::get('admin/posts', [AdminPostController::class, 'index']);
    // Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']);
    // Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update']);
    // Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy']);

});
