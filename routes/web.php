<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('user.blog');
// });

// Route::get('/post', function () {
//     return view('user.post');
// })->name('post');

Route::get('admin/home', function () {
    return view('admin.home');
})->name('admin-home');

// Route::get('admin/post', function () {
//     return view('admin.post.post');
// })->name('admin-post');

// Route::get('admin/tag', function () {
//     return view('admin.tag.tag');
// })->name('admin-tag');

// Route::get('admin/category', function () {
//     return view('admin.category.category');
// })->name('admin-category');

// USER ROUTES
Route::group(['namespace' => 'User'], function(){
    Route::get('/','HomeController@index');
    Route::get('post/{post}','PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');
});


Route::group(['namespace' => 'Admin'], function(){
    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@adminLogin');
    // Admin Home
    Route::get('admin/home','HomeController@index')->name('admin.home');
    // User Routes
    Route::resource('admin/user','UserController');
    // Role Routes
    Route::resource('admin/role','RoleController');
    // Permission Routes
    Route::resource('admin/permission','PermissionController');
    // Post Routes
    Route::resource('admin/post','PostController');
    // Tag Routes
    Route::resource('admin/tag','TagController');
    // Category Routes
    Route::resource('admin/category','CategoryController');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
