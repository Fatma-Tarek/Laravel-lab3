<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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



Route::get('/auth/redirect', function () {
    //dd("we are  login with github");
    return Socialite::driver('github')->redirect();
});
/*
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
   // dd($user->user["email"]);
   // $this->_registerOrLoginUser($user);
    // Return home after login
    $user1 = User::where('email', '=', $user->email)->first();
    if (!$user1) {
        $user1 = new User();
        $user1->name = $user->name;
        $user1->email = $user->email;
        //$user1->user_id = $user->user_id;
        $user1->password = 12345678;
        $user1->save();
    }
    Auth::login($user1);
    return redirect()->route('posts.index');
    // $user->token
});
*/
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
   // dd($user->user["email"]);
   // $this->_registerOrLoginUser($user);
    // Return home after login
    $user1 = Usergit::where('email', '=', $user->email)->first();
    if (!$user1) {
        $user1 = new Usergit();
        $user1->name = $user->name;
        $user1->email = $user->email;
        //$user1->user_id = $user->user_id;
        $user1->password = 12345678;
        $user1->save();
    }
    Auth::login($user1);
    return redirect()->route('posts.index');
    // $user->token
});




/*
 function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->user_id = $data->id;
            //$user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
*/