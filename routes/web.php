<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'post' => 'PostController',
]);

Route::resources([
    'follow' => 'FollowController',
]);

Route::middleware('auth', 'throttle:60,1')->group(function () {
    Route::resource('post_like', 'PostLikeController', ['only' => ['destroy', 'store']]);
    Route::resource('comment_like', 'CommentLikeController', ['only' => ['destroy', 'store']]);
});

Route::post('/comment/{post_id}', 'CommentController@store');
//Route::get('/{user_id}', 'ProfileController@profile');
