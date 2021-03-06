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
Auth::routes();

Route::get('/', 'PagesController@home');
Route::get('/application', 'ApplicationsController@create')->name('application.create');
// Route::post('/application/{applicationId}/personal-details/{personalDetailsId}', 'ApplicationsController@addApplication')->name('application.store.personal');
// Route::post('/application/{applicationId}/service-type/{serviceTypeId}', 'ApplicationsController@addServiceType')->name('application.store.servce');
// Route::post('/application/{applicationId}/banking-details/{bankingDetailsId}', 'ApplicationsController@addBankingDetails')->name('application.store.banking');
Route::get('/ftth-requests', 'SurveysController@index')->name('list.request');
Route::get('/ftth-requests/create', 'SurveysController@create')->name('create.request');
Route::post('/ftth-requests', 'SurveysController@store')->name('store.request');
Route::get('/ftth-areas', 'PagesController@ftthAreas')->name('ftth.areas');
Route::get('/ftth-requests/export/{type}', 'SurveysController@export')->name('export.excel');
Route::get('/packages', 'PackagesController@index')->name('packages.list');


Route::get('/admin', 'AdminController@index');

 //Locations

Route::get('/admin/locations', 'LocationController@index')->name('locations.index');
Route::get('/admin/locations/create', 'LocationController@create')->name('locations.create');
Route::post('/admin/locations/store', 'LocationController@store')->name('locations.store');
Route::get('/admin/locations/{id}/edit', 'LocationController@edit')->name('locations.edit');
Route::get('/admin/locations/{id}', 'LocationController@show')->name('locations.show');
Route::patch('/admin/locations/{location}/update', 'LocationController@update')->name('locations.update');
Route::delete('admin/locations/{id}/destroy', 'LocationController@destroy')->name('locations.destroy');
                                    //Ftth Locations

Route::get('/admin/ftth-locations', 'FtthLocationController@index')->name('ftthLocations.index');
Route::get('/admin/ftth-locations/create', 'FtthLocationController@create')->name('ftthLocations.create');
Route::post('/admin/ftth-locations/store', 'FtthLocationController@store')->name('ftthLocations.store');
Route::get('/admin/ftth-locations/{id}/edit', 'FtthLocationController@edit')->name('ftthLocations.edit');
Route::get('/admin/ftth-locations/{id}', 'FtthLocationController@show')->name('ftthLocations.show');
Route::patch('/admin/ftth-locations/{ftthLocation}/update', 'FtthLocationController@update')->name('ftthLocations.update');
Route::delete('admin/ftth-locations/{id}/destroy', 'FtthLocationController@destroy')->name('ftthLocations.destroy');

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




                                     //package lookup
Route::get('/admin/packages', 'PackagesLookupController@index')->name('packagesLookups.index');
Route::post('/admin/packages/store', 'PackagesLookupController@store')->name('packagesLookups.store');
Route::get('/admin/packages/create', 'PackagesLookupController@create')->name('packagesLookups.create');
Route::get('/admin/packages/{id}/edit', 'PackagesLookupController@edit')->name('packagesLookups.edit');
Route::get('/admin/packages/{id}', 'PackagesLookupController@show')->name('packagesLookups.show');
Route::patch('/admin/packages/{packages_lookup}/update', 'PackagesLookupController@update')->name('packagesLookups.update');
Route::delete('/admin/packages/{id}/destroy', 'PackagesLookupController@destroy')->name('packagesLookups.destroy');

//Route::resource('ftthLocations', 'FtthLocationController');
//Route::resource('locations', 'LocationController');
//Route::resource('packagesLookups', 'PackagesLookupController');



// Route::group(['middleware' => 'isAdmin'], function () {
    
    Route::resource('users', 'UserController');
    Route::get('/users/{user}/resetpassword', 'UserController@editPassword')->name('users.editpassword');
    Route::patch('/users/{user}/resetpassword', 'UserController@resetPassword')->name('users.resetpassword');
    // });
    
    
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        
    // Route::resource('ftthApplications', 'FtthApplicationController');

    Route::resource('ftthApplications', 'ApplicationsController');
    Route::get('/users/{user}/resetpassword', 'UserController@editPassword')->name('users.editpassword');
    Route::patch('/users/{user}/resetpassword', 'UserController@resetPassword')->name('users.resetpassword');
    
        Route::group(['middleware' => 'isAdmin'], function () {
        Route::resource('users', 'UserController');
    });

});