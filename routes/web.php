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

Route::get('/', function () {
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']],
    function (){

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        //Tag route
        Route::get('tags/change-status/{tag}', 'TagController@changeStatus')->name('tags.change.status');
        Route::resource('tags', 'TagController');

        //Category route
        Route::get('categories/change-status/{category}', 'CategoryController@changeStatus')->name('categories.change.status');
        Route::resource('categories', 'CategoryController');

        //Post route
        Route::get('posts/change-status/{category}', 'PostController@changeStatus')->name('posts.change.status');
        Route::resource('posts', 'PostController');
    }
);

Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author', 'middleware' => ['auth', 'author']],
    function (){

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        //Post route
        Route::get('posts/change-status/{category}', 'PostController@changeStatus')->name('posts.change.status');
        Route::resource('posts', 'PostController');
    }
);
