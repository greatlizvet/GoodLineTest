<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/profile/{id}', 'UserController@index');
Route::get('/update/{id}', 'PastaController@update');
Route::get('/', 'PastaController@index');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'PastaController@index')->name('index');
Route::get('/create', 'PastaController@create')->name('create');
Route::get('/search', 'PastaController@search');

//после него ничего не ставить
Route::get('/{hash}', 'PastaController@show');


Route::post('store', 'PastaController@store');
