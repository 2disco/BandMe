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

// User routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/show/{id}', 'HomeController@show');

Route::resource('/user','UserController');
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@updateAvatar');

// Band routes
Route::resource('/band','BandController');
Route::post('/bandprofile/{band}', 'BandController@updateBandAvatar');
Route::get('/band/{id}/{slug}', 'BandController@detail');

Route::delete('/band/{band}/users/{user}', 'BandController@removeBandMember');
Route::get('/bandlist/', 'BandController@listBandAvailable');
Route::post('/band/{band}', 'BandController@addBandMember');


// Admin routes
Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::delete('/admin_band/{band}', 'AdminController@removeBand');
Route::delete('/admin_user/{user}', 'AdminController@removeUser');

Route::get('/admin_user/{user}/edit', 'AdminController@editUser');
Route::get('/admin_band/{band}/edit', 'AdminController@editBand');

Route::patch('/admin_band/{band}', 'AdminController@updateBand');
Route::patch('/admin_user/{user}', 'AdminController@updateUser');
