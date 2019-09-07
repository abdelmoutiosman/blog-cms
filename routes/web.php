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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Setting;

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify'=>true]);
Route::group(['middleware'=>'auth'],function (){
    //route for admin dashboard
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    //route of categories
    Route::resource('/category', 'CategoryController');
    //route to edit category
    Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}/','CategoryController@update')->name('category.update');
    //route to delete category
    Route::get('/category/delete/{id}/','CategoryController@destroy')->name('category.delete');

    //route of tags
    Route::resource('/tag', 'TagController');
    //route to edit tag
    Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}/','TagController@update')->name('tag.update');
    //route to delete tag
    Route::get('/tag/delete/{id}/','TagController@destroy')->name('tag.delete');

    //route to soft delete post
    Route::get('/post/trashed/','PostController@trashed')->name('post.trashed');
    //route to delete all post
    Route::get('/post/hdelete/{id}/','PostController@hdelete')->name('post.hdelete');
    //route to restore all delete
    Route::get('/post/restore/{id}/','PostController@restore')->name('post.restore');
    //route of posts
    Route::resource('/post', 'PostController');
    //route to edit post
    Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
    Route::post('/post/update/{id}/','PostController@update')->name('post.update');
    //route to delete post
    Route::get('/post/delete/{id}/','PostController@destroy')->name('post.delete');

    //route of users
    Route::resource('/user', 'UserController');
    //route to edit user
    Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}/','UserController@update')->name('user.update');
    //route to delete user
    Route::get('/user/delete/{id}/','UserController@destroy')->name('user.delete');
    //route to make user admin
    Route::get('/user/admin/{id}/','UserController@admin')->name('user.admin');
    //route to make user not admin
    Route::get('/user/notadmin/{id}/','UserController@notadmin')->name('user.notadmin');

    //route for settings
    Route::get('/setting/index','SettingController@index')->name('setting.index');
    Route::post('/setting/update','SettingController@update')->name('setting.update');


//    Route::get('/abdo',function(){
//        return App\Models\Tag::find(4)->posts;
//        return App\Models\Post::find(4)->tags;
//    })->name('abdo');

});
//route for query results
Route::get('/results', function () {
    $post=Post::where('title','like','%'.request('search').'%')->get();
    return view('results.results')
        ->with('posts',$post)
        ->with('title','result: '.request('search'))
        ->with('settings',Setting::first())
        ->with('categories',Category::take(4)->get())
        ->with('tags',Tag::all())
        ->with('query',request('search'));
});

//route for showing single post
Route::get('/{slug}/','SiteUIController@showPost')->name('post.show');

//route for user front end
Route::get('/Category/{id}/','SiteUIController@category')->name('category.show');

Route::get('/Tag/{id}/','SiteUIController@tagFunction')->name('tag.show');

//route for design name is index
Route::get('/','SiteUIController@index')->name('index');

