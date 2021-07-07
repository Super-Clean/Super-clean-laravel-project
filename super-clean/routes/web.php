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

Route::get('/create/cars', function () {    return view('pages.create.cars');});
Route::get('/create/places', function () {    return view('pages.create.places');});
Route::get('/create/laundries', function () {   return view('pages.create.laundries');});

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function() { return view('web.index');});
Route::get('/about', function() {return view('web.about');});

Route::post('/service/filter', 'ServiceController@filter')->name('service.filter');

//Route::post('/My_Articles', 'AdminController@my_articles')->name('My_Articles');

route::resource('service','ServiceController');
route::resource('Admin','AdminController');
