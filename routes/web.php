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

//dd(resolve('App\Billing\Stripe'));

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@list');
Route::get('/posts/{post}', 'PostsController@show');



Route::post('/posts', 'PostsController@store');

Route::delete('/posts/{post}', 'PostsController@delete');

Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/category/{category}', 'CategoriesController@show');

// Users routes
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/store', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/users/{user}', 'UsersController@update');

// Dashboard routes
Route::get('/dashboard', 'DashboardController@index');
Route::get('/users', 'UsersController@index')->name('users');
Route::delete('/users/{user}/delete', 'UsersController@delete');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::post('/posts/{post}/edit', 'PostsController@save');
Route::get('/post/create', 'PostsController@create');

// Categories routes
Route::get('/categories', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::post('/category/{category}/edit', 'CategoryController@save');
Route::delete('/category/{category}', 'CategoryController@delete');


Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');

});