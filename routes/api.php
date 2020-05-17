<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([

     'middleware' => 'api',
    'prefix' => 'auth',
    'except' => 'login'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('activate/{tokenemail}', 'AuthController@verify');
});

Route::group([
    'middleware' => ['api','jwt.verify','checkAdmin'],
    'prefix' => 'auth'
], function (){

    Route::get('/categories/{cat}/subcategory/{id}/edit' , 'Admin\CategoriesController@edit')->where(['cat' => '[1-9]+'],['id' ,'[1-9]+']);
    Route::post('/categories' , 'Admin\CategoriesController@store');
    Route::delete('/categories/{id}' , 'Admin\CategoriesController@destroy')->where('id' , '[1-9]+');
    Route::put('/categories/{id}' , 'Admin\CategoriesController@update')->where('id' , '[1-9]+');

    Route::get('/movies' , 'Admin\MoviesController@index');
    Route::get('/movies/{id}/edit' , 'Admin\MoviesController@edit')->where('id' , '[1-9]+');
    Route::get('/movies/{id}/show' , 'Admin\MoviesController@show')->where('id' , '[1-9]+');
    Route::post('/movies' , 'Admin\MoviesController@store');
    Route::put('/movies/{id}' , 'Admin\MoviesController@update')->where('id' , '[1-9]+')->name('update');
    Route::delete('/movies/{id}' , 'Admin\MoviesController@destroy')->where('id' , '[1-9]+');

    Route::get('/slides' , 'Admin\SlidesController@index');
    Route::post('/slides' , 'Admin\SlidesController@store');
    Route::get('/slides/{id}/edit' , 'Admin\SlidesController@edit')->where('id' , '[1-9]+');
    Route::put('/slides/{id}' , 'Admin\SlidesController@update')->where('id' , '[1-9]+');;
    Route::delete('/slides/{id}' , 'Admin\SlidesController@destroy')->where('id' , '[1-9]+');;

    Route::get('/price' , 'Admin\PricelistController@index');
    Route::get('/price/{id}/show' , 'Admin\PricelistController@show')->where('id' , '[1-9]+');
    Route::post('/price' , 'Admin\PricelistController@store');
    Route::get('/price/{id}/edit' , 'Admin\PricelistController@edit')->where('id' , '[1-9]+');
    Route::put('/price/{id}' , 'Admin\PricelistController@update')->where('id' , '[1-9]+');
    Route::delete('/price/{id}' , 'Admin\PricelistController@destroy')->where('id' , '[1-9]+');

    Route::get('/contact' , 'Admin\ContactController@index');
    Route::post('/contact' , 'Admin\ContactController@store');
    Route::get('/contact/{id}/edit' , 'Admin\ContactController@edit')->where('id' , '[1-9]+');
    Route::put('/contact/{id}' , 'Admin\ContactController@update')->where('id' , '[1-9]+');
    Route::delete('/contact/{id}' , 'Admin\ContactController@destroy')->where('id' , '[1-9]+');

    Route::get('/actors' , 'Admin\ActorsController@index');
    Route::get('/actors/{id}/edit' , 'Admin\ActorsController@edit')->where('id' , '[1-9]+');
    Route::post('/actors' , 'Admin\ActorsController@store');
    Route::put('/actors/{id}' , 'Admin\ActorsController@update')->where('id' , '[1-9]+');
    Route::delete('/actors/{id}' , 'Admin\ActorsController@destroy')->where('id' , '[1-9]+');


    Route::get('/users' , 'Admin\UserController@index');
    Route::get('/users/{id}/edit' , 'Admin\UserController@edit')->where('id' , '[1-9]+');
    Route::post('/users' , 'Admin\UserController@store');
    Route::put('/users/{id}' , 'Admin\UserController@update')->where('id' , '[1-9]+');
    Route::delete('/users/{id}' , 'Admin\UserController@destroy')->where('id' , '[1-9]+');


});

Route::get('/categories/{id}' , 'CategoriesController@getAllCategories')->where('id' , '[1-9]+');

Route::post('/register', 'AuthController@register');
Route::get('/slidess' , 'SlidesController@getAllSlides');
Route::get('/moviess' , 'MoviesController@getAllMovies');
Route::get('/movies/new' , 'MoviesController@getNewMovies');
Route::get('/movies/categories/{cat}/subcategory/{id}' , 'MoviesController@getMoviesCategories')->where(['cat' => '[1-9]+'],['id' => '[1-9]+']);
