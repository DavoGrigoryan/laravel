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
    return view('welcome');
});

Auth::routes();

Route::get('/admin-page', 'HomeController@admin')->middleware(['auth','accessAdmin']);
Route::get('/user-page', 'HomeController@user')->middleware(['auth']);

Route::get('/add-post','PostController@index')->middleware(['auth'])->name('addPost');
Route::post('/store-post','PostController@store')->middleware(['auth'])->name('store');
Route::get('/edit-post/{post_id}','PostController@edit')->middleware(['auth'])->name('edit');
Route::post('/update-post/{post_id}','PostController@update')->middleware(['auth'])->name('update');
Route::get('/delete-post/{post_id}','PostController@destroy')->middleware(['auth'])->name('destroy');
