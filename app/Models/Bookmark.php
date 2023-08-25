<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_id');
    }
}
