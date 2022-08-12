<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UploadsController;

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
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::any('/newpost', [PostsController::class, 'newpost'])->name('newpost');
    Route::any('/edit_post/{post}', [PostsController::class, 'edit_post'])->name('post.edit');
    Route::get('/delete_post/{post}', [PostsController::class, 'delete_post'])->name('post.delete');
    Route::any('/newcomment/{post}', [CommentsController::class, 'new_comment'])->name('newcomment');

});

Route::get('/post/{post}', [PostsController::class, 'post'])->name('post');
Route::get('/posts', [PostsController::class, 'index'])->name('posts');





Route::any('/search', [PostsController::class, 'search'])->name('search');

Route::get('/todo', function(){return view('todo');})->name('todo');

Route::get('/upload', [UploadsController::class, 'index'])->name('upload');
Route::post('/upload', [UploadsController::class, 'upload'])->name('upload');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

