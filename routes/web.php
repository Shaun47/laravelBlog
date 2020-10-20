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


Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');



Route::get('/','FrontPageController@index')->name('home');
Route::get('/blog', 'BlogController@index')->name('blog');

Route::get('/blog/{post}','BlogController@show')->name('blog.show');
Route::get('/category/{category}','BlogController@category')->name('category');
Route::get('/author/{author}','BlogController@author')->name('author');

Route::resource('backend/other','Backend\AdminController');
Route::resource('backend/categories','Backend\CategoriesController');
Route::resource('backend/users','Backend\UsersController');
Route::get('backend/users/{user}','Backend\UsersController@confirm')->name('users.confirm');
Route::put('/backend/update/{update}', 'Backend\AdminController@solutionUpdate')->name('other.solution');
Route::put('/backend/other/{other}', 'Backend\AdminController@restore')->name('other.restore');
Route::delete('/backend/force-destroy/{other}', 'Backend\AdminController@sorao')->name('other.forceDestroy');