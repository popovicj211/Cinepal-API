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

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');;
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me')->name('me');
    Route::get('activate/{tokenemail}', 'AuthController@verify')->name('verification');;
});

Route::group([
    'middleware' => ['api','jwt.verify','checkAdmin'],
    'prefix' => 'auth'
], function (){
    Route::get('/categories/{id}' , 'Admin\CategoriesController@index')->where(['cat' => '[1-9]+'],['id' ,'[1-9]+'])->name('admin.getCategories');
    Route::get('/categories/{cat}/subcategory/{id}/edit' , 'Admin\CategoriesController@edit')->where(['cat' => '[1-9]+'],['id' ,'[1-9]+'])->name('admin.getCategoryEdit');
    Route::post('/categories' , 'Admin\CategoriesController@store')->name('admin.addCategory');
    Route::delete('/categories/{id}' , 'Admin\CategoriesController@destroy')->where('id' , '[1-9]+')->name('admin.deleteCategory');
    Route::put('/categories/{id}' , 'Admin\CategoriesController@update')->where('id' , '[1-9]+')->name('admin.updateCategory');

    Route::get('/movies' , 'Admin\MoviesController@index')->name('admin.getMovies');
    Route::get('/movies/{id}/edit' , 'Admin\MoviesController@edit')->where('id' , '[1-9]+')->name('admin.getMovieEdit');
    Route::get('/movies/{id}/show' , 'Admin\MoviesController@show')->where('id' , '[1-9]+')->name('admin.getMovieShow');
    Route::post('/movies' , 'Admin\MoviesController@store')->name('admin.addMovie');
    Route::put('/movies/{id}' , 'Admin\MoviesController@update')->where('id' , '[1-9]+')->name('admin.updateMovie');
    Route::delete('/movies/{id}' , 'Admin\MoviesController@destroy')->where('id' , '[1-9]+')->name('admin.deleteMovie');

    Route::get('/slides' , 'Admin\SlidesController@index')->name('admin.getSlides');
    Route::post('/slides' , 'Admin\SlidesController@store')->name('admin.addSlide');
    Route::get('/slides/{id}/edit' , 'Admin\SlidesController@edit')->where('id' , '[1-9]+')->name('admin.getSlideEdit');
    Route::put('/slides/{id}' , 'Admin\SlidesController@update')->where('id' , '[1-9]+')->name('admin.updateSlide');
    Route::delete('/slides/{id}' , 'Admin\SlidesController@destroy')->where('id' , '[1-9]+')->name('admin.deleteSlide');

    Route::get('/price' , 'Admin\PricelistController@index')->name('admin.getPrices');
    Route::get('/price/{id}/show' , 'Admin\PricelistController@show')->where('id' , '[1-9]+')->name('admin.getPriceShow');
    Route::post('/price' , 'Admin\PricelistController@store')->name('admin.addPrice');
    Route::get('/price/{id}/edit' , 'Admin\PricelistController@edit')->where('id' , '[1-9]+')->name('admin.getPriceEdit');
    Route::put('/price/{id}' , 'Admin\PricelistController@update')->where('id' , '[1-9]+')->name('admin.updatePrice');
    Route::delete('/price/{id}' , 'Admin\PricelistController@destroy')->where('id' , '[1-9]+')->name('admin.deletePrice');

    Route::get('/contact' , 'Admin\ContactController@index')->name('admin.getContact');
    Route::post('/contact' , 'Admin\ContactController@store')->name('admin.addContact');
    Route::get('/contact/{id}/edit' , 'Admin\ContactController@edit')->where('id' , '[1-9]+')->name('admin.getContactEdit');
    Route::put('/contact/{id}' , 'Admin\ContactController@update')->where('id' , '[1-9]+')->name('admin.updateContact');
    Route::delete('/contact/{id}' , 'Admin\ContactController@destroy')->where('id' , '[1-9]+')->name('admin.deleteContact');

    Route::get('/roles' , 'Admin\RoleController@index')->name('admin.getRoles');
    Route::post('/roles' , 'Admin\RoleController@store')->name('admin.addRole');
    Route::get('/roles/{id}/edit' , 'Admin\RoleController@edit')->where('id' , '[1-9]+')->name('admin.getRoleEdit');
    Route::put('/roles/{id}' , 'Admin\RoleController@update')->where('id' , '[1-9]+')->name('admin.updateRole');
    Route::delete('/roles/{id}' , 'Admin\RoleController@destroy')->where('id' , '[1-9]+')->name('admin.deleteRole');

    Route::get('/actors' , 'Admin\ActorsController@index')->name('admin.getActors');
    Route::get('/actors/{id}/edit' , 'Admin\ActorsController@edit')->where('id' , '[1-9]+')->name('admin.getActorEdit');
    Route::post('/actors' , 'Admin\ActorsController@store')->name('admin.addActor');
    Route::put('/actors/{id}' , 'Admin\ActorsController@update')->where('id' , '[1-9]+')->name('admin.updateActor');
    Route::delete('/actors/{id}' , 'Admin\ActorsController@destroy')->where('id' , '[1-9]+')->name('admin.deleteActor');

    Route::get('/users' , 'Admin\UserController@index')->name('admin.getUsers');
    Route::get('/users/{id}/edit' , 'Admin\UserController@edit')->where('id' , '[1-9]+')->name('admin.getUserEdit');
    Route::post('/users' , 'Admin\UserController@store')->name('admin.addUser');
    Route::put('/users/{id}' , 'Admin\UserController@update')->where('id' , '[1-9]+')->name('admin.updateUser');
    Route::delete('/users/{id}' , 'Admin\UserController@destroy')->where('id' , '[1-9]+')->name('admin.deleteUser');

    Route::get('/seatchecker' , 'Admin\SeatcheckerController@index')->name('admin.getSeatcheckers');
    Route::get('/seatchecker/{id}/edit' , 'Admin\SeatcheckerController@edit')->where('id' , '[1-9]+')->name('admin.getSeatcheckerEdit');
    Route::post('/seatchecker' , 'Admin\SeatcheckerController@store')->name('admin.addSeatchecker');
    Route::put('/seatchecker/{id}' , 'Admin\SeatcheckerController@update')->where('id' , '[1-9]+')->name('admin.updateSeatchecker');
    Route::delete('/seatchecker/{id}' , 'Admin\SeatcheckerController@destroy')->where('id' , '[1-9]+')->name('admin.deleteSeatchecker');

    Route::get('/reservation' , 'Admin\ReservationController@index')->name('admin.getReservations');
    Route::get('/reservation/{id}/show' , 'Admin\ReservationController@show')->where('id' , '[1-9]+')->name('admin.getReservationShow');
    Route::get('/reservation/{id}/edit' , 'Admin\ReservationController@edit')->where('id' , '[1-9]+')->name('admin.getReservationEdit');
    Route::post('/reservation' , 'Admin\ReservationController@store')->name('admin.addReservation');
    Route::put('/reservation/{id}','Admin\ReservationController@update')->where('id' , '[1-9]+')->name('admin.updateReservation');
    Route::delete('/reservation/{id}','Admin\ReservationController@destroy')->where('id' , '[1-9]+')->name('admin.deleteReservation');


});

Route::group([
    'middleware' => ['api','jwt.verify'],
    'prefix' => 'auth',
], function (){
    Route::get('/seatchecker/free/{free}' , 'SeatcheckerController@getSeatCheckersFree')->where('free' , '[0-1]')->name('seatchecker');
 //   Route::put('/seatchecker/free/{free}' , 'SeatcheckerController@updateSeatCheckersFree')->where('free' , '[0-1]');
    Route::put('/seatchecker/free/rt/{free}' , 'SeatcheckerController@updateSeatCheckersFree')->where('free' , '[0-1]')->name('seatcheckerrt');
    Route::post('/reservationn' , 'ReservationController@addReservation')->name('reservation');
});

Route::get('/categories/{id}' , 'CategoriesController@getAllCategories')->where('id' , '[1-9]+')->name('categories');
Route::get('/tehnologies/movie/{movie}' , 'CategoriesController@getTehnologiesMovie')->where('movie' , '[1-9]+')->name('movieTehnologies');

Route::post('/register', 'AuthController@register')->name('register');
Route::get('/slidess' , 'SlidesController@getAllSlides')->name('slides');
Route::get('/moviess' , 'MoviesController@getAllMovies')->name('movies');
Route::get('/movie/{id}' , 'MoviesController@getMovie')->where('id' , '[1-9]+')->name('movie');
Route::get('/movies/new' , 'MoviesController@getNewMovies')->name('newMovies');
Route::get('/movies/categories/{cat}/subcategory/{id}' , 'MoviesController@getMoviesCategories')->where(['cat' => '[1-9]+'],['id' => '[1-9]+'])->name('category');
Route::get('/actorss' , 'ActorsController@getAllActors')->name('actors');
Route::post('/contactt' , 'ContactController@sendContact')->name('contact');






