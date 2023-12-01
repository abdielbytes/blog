<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    $doc = YamlFrontMatter:: parseFile(
        resource_path('posts/first-post.html')
    );
//    return view('posts',[
//        'posts' => Post::all()
//        ]);
});

Route::get('post/{post}', function($slug){
//    Find a post by its slug and pass it to a view called "post"


    return view ('post',[
        'post' => Post::find($slug)
    ]);
//
//
//
//

})->where('post', '[A-z_\-]+');
