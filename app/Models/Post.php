<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    /**
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct($title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($doc) => new Post(

                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->slug,
                    $doc->body()
                ))
                ->sortByDesc('date');
        });



    }
    public static function find($slug)
    {

//        Find posts with a slug that matches the one was requested
       return static::all()->firstwhere('slug', $slug);

    }
    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
