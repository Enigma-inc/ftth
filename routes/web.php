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

Route::get('/home', 'HomeController@index');
Route::get('/application', 'ApplicationsController@create')->name('ftth.apply');
Route::get('/ftth-requests', 'SurveysController@index')->name('list.request');
Route::get('/ftth-requests/create', 'SurveysController@create')->name('create.request');
Route::post('/ftth-requests', 'SurveysController@store')->name('store.request');
