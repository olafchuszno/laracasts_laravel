<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

// added in lesson 12
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{


    public function __construct(public $title, public $excerpt, public $date, public $body, public $slug) {}
    

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {

            // Return a collection of all the files from the posts directory in resources/ 
            // (We are going to chain over that collection)
            return collect(File::files(resource_path("posts")))

            // Map through each file from the collection and parse them
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))

            // map AGAIN, this time over the files we just parsed (now calling them documents),
            // and finally, for each file we return a new Post object with all of the parsed file ($document) data
            ->map(fn ($document) => new Post (
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            // Sort the collection by each post object's date in a descending order
            ->sortByDesc("date");

        });
    }

    public static function find($slug)
    {
        // From all the posts, return the first one where the slug is the same as $slug argument
        return static::all()->firstWhere('slug', $slug);
        
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if (! $post) {
            return throw new ModelNotFoundException();
        }

        return $post;
    }

}