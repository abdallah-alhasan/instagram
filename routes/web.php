<?php

use Illuminate\Routing\Route as RoutingRoute;
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



Auth::routes();


Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');


Route::get('/', 'App\Http\Controllers\postsController@index');
Route::get('/p/{post}', 'App\Http\Controllers\postsController@show');
Route::get('/post/create', 'App\Http\Controllers\postsController@create');
Route::post('/p', 'App\Http\Controllers\postsController@store');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('follow/{user}' , 'App\Http\Controllers\followsController@store');