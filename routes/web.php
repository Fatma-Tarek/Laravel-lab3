<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    //  return 'welcome';
});
/*
Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', [PostController::class ,'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/deletedposts/{post}', [PostController::class, 'getDeletePosts'])->name('getDeletePosts');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class ,'edit'])->name('posts.edit');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});
*/
 Route::get('/posts', [PostController::class ,'index'])->name('posts.index')->middleware('auth');
 Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
 Route::get('posts/deletedposts/{post}', [PostController::class, 'getDeletePosts'])->name('getDeletePosts')->middleware('auth');
 Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
 Route::get('/posts/{post}', [PostController::class ,'show'])->name('posts.show')->middleware('auth');
 Route::get('/posts/{post}/edit', [PostController::class ,'edit'])->name('posts.edit')->middleware('auth');
 Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
 Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

Auth::routes();
