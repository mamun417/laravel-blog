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

########### Start frontend route ############

// Hide sidebar route
Route::get('hide-sidebar', 'Backend\Admin\SettingController@hideSidebar')->name('hide-sidebar');

// Frontend home route
Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

// Post route
Route::get('posts', 'Frontend\PostController@allPost')->name('frontend.all-posts');
Route::get('post/{slug}', 'Frontend\PostController@view')->name('frontend.post.view');

//Post by category
Route::get('posts/{slug}', 'Frontend\PostController@postByCategory')->name('frontend.posts.by-category');

Route::group(['as' => 'frontend.', 'prefix' => 'posts', 'namespace' => 'Frontend', 'middleware' => ['auth']],
    function (){

        // Favorite post route
        Route::get('favorite/{post}/store', 'FavoritePostController@store')->name('post.favorite.store');

        //Comment route
        Route::post('comment/{post}', 'CommentController@store')->name('post.comment.store');
    }
);

// subscriber route
Route::post('subscribers', 'Frontend\SubscriberController@store')->name('frontend.subscribers.store');

######### End frontend route ###############





########## Admin route start ###############

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Admin', 'middleware' => ['auth', 'admin']],
    function (){

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        //Setting route
        Route::get('settings', 'SettingController@index')->name('settings.update');
        Route::post('settings', 'SettingController@profileUpdate')->name('settings.profile.update');
        Route::post('settings/change-password', 'SettingController@changePassword')->name('settings.password.change');

        //Tag route
        Route::get('tags/change-status/{tag}', 'TagController@changeStatus')->name('tags.change.status');
        Route::resource('tags', 'TagController');

        //Category route
        Route::get('categories/change-status/{category}', 'CategoryController@changeStatus')->name('categories.change.status');
        Route::resource('categories', 'CategoryController');

        //Post route
        Route::get('posts/change-status/{post}', 'PostController@changeStatus')->name('posts.change.status');
        Route::get('posts/change-approve/{post}', 'PostController@changeApproveStatus')->name('posts.change.approve-status');
        Route::get('posts/pending', 'PostController@pendingList')->name('posts.pending');
        Route::resource('posts', 'PostController');

        //Subscriber route
        Route::get('subscribers', 'ManageSubscriberController@index')->name('subscribers.index');
        Route::delete('subscribers/{subscriber}', 'ManageSubscriberController@destroy')->name('subscribers.destroy');
    }
);

Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Backend\Author', 'middleware' => ['auth', 'author']],
    function (){

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        //Post route
        Route::get('posts/change-status/{post}', 'PostController@changeStatus')->name('posts.change.status');
        Route::resource('posts', 'PostController');

        //Setting route
        Route::get('settings', 'SettingController@index')->name('settings.update');
        Route::post('settings', 'SettingController@profileUpdate')->name('settings.profile.update');
        Route::post('settings/change-password', 'SettingController@changePassword')->name('settings.password.change');

    }
);

//Partial route (admin, author)
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Partial', 'middleware' => ['auth']],
    function (){

        //Comment route
        Route::get('comments', 'CommentController@index')->name('comments.index');
        Route::delete('comments/{comment}', 'CommentController@delete')->name('comments.delete');

        //Favorite post route
        Route::get('favorite/posts', 'FavoritePostController@index')->name('favorite.posts.index');
    }
);

Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Backend\Partial', 'middleware' => ['auth']],
    function (){

        //Comment route
        Route::get('comments', 'CommentController@index')->name('comments.index');
        Route::delete('comments/{comment}', 'CommentController@delete')->name('comments.delete');

        Route::get('favorite/posts', 'FavoritePostController@index')->name('favorite.posts.index');
    }
);
