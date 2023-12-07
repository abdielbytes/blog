<?php

use Illuminate\Support\Facades\File;
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

Route::get('/', function (){
    return view('posts',[
        'posts' => Post::latest()->with('category')->get()
        ]);
});

Route::get('post/{post:slug}', function(Post $post){
//    Find a post by its slug and pass it to a view called "post"


    return view ('post',[
        'post' => $post
    ]);
});

Route::get('category/{category:slug}', function () {

    return view('posts',[
        'posts' => Post::all()
    ]);
});
