<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/',['as'=>'root','uses'=>'PagesController@welcome']);
    Route::get('/login',['middleware'=>'guest','as'=>'login','uses'=>'AuthController@login']);
    Route::post('/handlelogin',['as'=>'handlelogin','uses'=>'AuthController@handle_login']);
    Route::get('/home',['middleware'=>'auth','as' => 'home','uses' => 'UsersController@home']);
    Route::get('/logout',['middleware'=>'auth','as'=>'logout','uses'=>'AuthController@logout']);

    Route::get('/like/{id}',['middleware'=>'auth','as'=>'like','uses'=>'PostsController@like']);
    Route::get('/unlike/{id}',['middleware'=>'auth','as'=>'unlike','uses'=>'PostsController@unlike']);

    Route::resource('users','UsersController',['only'=>['create','store']]);
    Route::resource('posts','PostsController');
    Route::get('/{username}',['as'=>'UserPosts','uses'=>'UsersController@listPosts']);
});
