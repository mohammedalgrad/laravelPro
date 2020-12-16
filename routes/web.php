<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([CheckGender::class])->group(function(){

    Route::resource('posts','App\Http\Controllers\PostController');

    Route::post('ajaxCreatePost',['App\Http\Controllers\PostController' , 'ajaxCreatePost'])->name('ajaxCreatePost');

    Route::resource('comments','App\Http\Controllers\CommentController');

    Route::get('timeline',function(){
                $posts = Post::all();
                $comments = Comment::all();
                return view('timeline',compact('posts','comments'));
    })->name("timeline");

});