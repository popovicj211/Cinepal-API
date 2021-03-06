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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activate/{token}', 'AuthController@verify');


Route::get('/show' ,  'AuthController@showverify')->name('showverify');

Route::get('/login' , 'AuthController@loginShow')->name('loginShow');
Route::get('/loginbrowser' , 'AuthController@loginBrowser')->name('loginBrowser');
Route::get('/welcome'  , 'AuthController@welcome')->name('welcome');
