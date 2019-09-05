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


use Illuminate\Support\Facades\Route;

Route::name('frontend.')->namespace('Frontend')->group(function (){
    Route::get('/', 'HomeController@showHome')->name('home');

    Route::get('/register', 'AuthController@showRegistrationForm')->name('register');
    Route::post('/register', 'AuthController@processRegistration');

    Route::get('/login', 'AuthController@showLoginForm')->name('login');
    Route::post('/login', 'AuthController@processLogin');

    Route::get('/profile','AuthController@showProfile')->name('profile');
    Route::get('/profile/edit','AuthController@showEditProfile')->name('edit_profile');
    Route::post('/profile/edit','AuthController@updateProfile');
    Route::post('/profile/photo','AuthController@updatePhoto')->name('update_photo');
    Route::post('/profile/password','AuthController@updatePassword')->name('update_password');

    Route::get('/logout','AuthController@logout')->name('logout');
    //categories
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/add', 'CategoryController@create')->name('categories.create');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/{id}', 'CategoryController@delete')->name('categories.delete');

    //post
    Route::get('/post', 'HomeController@post')->name('post');
});

Route::name('backend.')->namespace('Backend')->prefix('backend')->group(function (){
    Route::get('/', 'HomeController@showHome')->name('home');
});


