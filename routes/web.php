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

Route::get('/admin', 'AdminController@index');

 //Locations

Route::get('/admin/locations', 'LocationsController@index')->name('locations.list');
Route::get('/admin/locations/create', 'LocationsController@create')->name('location.create');
Route::post('/admin/locations/store', 'LocationsController@store')->name('location.store');
Route::get('/admin/locations/{id}/edit', 'LocationsController@edit')->name('location.edit');
Route::patch('/admin/locations/{location}/update', 'LocationsController@update')->name('location.update');
Route::post('admin/locations/{id}/destroy', 'LocationsController@destroy')->name('location.destroy');

                                    //Ftth Locations

Route::get('/admin/ftth-locations', 'FtthLocationsController@index')->name('ftthLocations.list');
Route::get('/admin/ftth-locations/create', 'FtthLocationsController@create')->name('ftthLocation.create');
Route::post('/admin/ftth-locations/store', 'FtthLocationsController@store')->name('ftthLocation.store');
Route::get('/admin/ftth-locations/{id}/edit', 'FtthLocationsController@edit')->name('ftthLocation.edit');
Route::patch('/admin/ftth-locations/{ftthLocation}/update', 'FtthLocationsController@update')->name('ftthLocation.update');
Route::post('admin/ftth-locations/{id}/destroy', 'FtthLocationsController@destroy')->name('ftthLocation.destroy');

                                    //Prepaid Packages
Route::get('/admin/prepaid-packages', 'PackagesController@prepaidPackages')->name('prepaidPackages.list');
Route::post('/admin/prepaid-packages/store', 'PrepaidPackages@storePrepaidPackage')->name('prepaidPackages.store');
Route::get('/admin/prepaid-packages/{id}/edit', 'PrepaidPackages@editPrepaidPackage')->name('prepaidPackages.edit');
Route::patch('/admin/prepaid-packages/{prepaidPackage}/update', 'PrepaidPackages@updatePrepaidPackage')->name('prepaidPackages.update');
Route::post('/admin/prepaid-packages/{id}/destroy', 'PrepaidPackages@destroyPrepaidPackage')->name('prepaidPackages.destroy');

                                    //Contract Packages
Route::get('/admin/contract-packages', 'PackagesController@contractPackages')->name('contractPackages.list');
Route::post('/admin/contract-packages/store', 'PrepaidPackages@storeContractPackage')->name('contractPackages.store');
Route::get('/admin/contract-packages/{id}/edit', 'PrepaidPackages@editContractPackage')->name('contractPackages.edit');
Route::patch('/admin/contract-packages/{prepaidPackage}/update', 'PrepaidPackages@updateContractPackage')->name('contractPackages.update');
Route::post('/admin/contract-packages/{id}/destroy', 'PrepaidPackages@destroyContractPackage')->name('contractPackages.destroy');

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


