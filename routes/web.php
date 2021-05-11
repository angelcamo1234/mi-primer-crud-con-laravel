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

Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/misposts', 'PostController@misPosts')->name('posts.misPosts');
Route::get('/crear', 'PostController@create')->name('posts.create');
Route::post('/guardar', 'PostController@store')->name('posts.store');
Route::delete('/eliminar/{post}', 'PostController@destroy')->name('posts.destroy');


Auth::routes();