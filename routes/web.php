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
Route::get('/admin', 'HomeController@vuetify');
Route::get('/application', 'ApplicationsController@create')->name('application.create');
Route::post('/application/{applicationId}/personal-details/{personalDetailsId}', 'ApplicationsController@addApplication')->name('application.store.personal');
Route::post('/application/{applicationId}/service-type/{serviceTypeId}', 'ApplicationsController@addServiceType')->name('application.store.servce');
Route::post('/application/{applicationId}/banking-details/{bankingDetailsId}', 'ApplicationsController@addBankingDetails')->name('application.store.banking');
Route::get('/ftth-requests', 'SurveysController@index')->name('list.request');
Route::get('/ftth-requests/create', 'SurveysController@create')->name('create.request');
Route::post('/ftth-requests', 'SurveysController@store')->name('store.request');
Route::get('/ftth-areas', 'SurveysController@ftthAreas')->name('ftth.areas');
Route::get('/ftth-requests/export/{type}', 'SurveysController@export')->name('export.excel');
Route::get('/packages','PackagesController@index')->name('packages.list');


