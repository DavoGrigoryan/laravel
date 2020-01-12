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

Route::get('/add-task','TaskController@index')->middleware(['auth'])->name('addTask');
Route::get('/set-task','TaskController@setTask')->middleware(['auth'])->name('setTask');
Route::post('/storeTask','TaskController@storeTask')->middleware(['auth'])->name('storeTask');

Route::post('/store-task','TaskController@store')->middleware(['auth'])->name('store');
Route::get('/edit-task/{post_id}','TaskController@edit')->middleware(['auth'])->name('edit');
Route::post('/update-task/{post_id}','TaskController@update')->middleware(['auth'])->name('update');
Route::get('/delete-task/{post_id}','TaskController@destroy')->middleware(['auth'])->name('destroy');


Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/admin/show-users','AdminController@showUsers')->middleware(['auth','accessAdmin'])->name('showUsers');
