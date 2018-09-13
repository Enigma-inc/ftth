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

Route::get('/', 'PagesController@home')->name('ftth.home');
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

Route::post('place-application', 'ApplicationsController@store');

   

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/users/{user}/resetpassword', 'UserController@editPassword')->name('users.editpassword');
    Route::patch('/users/{user}/resetpassword', 'UserController@resetPassword')->name('users.resetpassword');
    
    
    Route::get('/users/{user}/applications', 'ApplicationsController@index')->name('applications.personal');
    Route::get('ftthApplications', 'ApplicationsController@index')->name('ftthApplications.index');
    Route::get('ftthApplications/create', 'ApplicationsController@create')->name('ftthApplications.create');
    Route::post('ftthApplications/store', 'ApplicationsController@store')->name('ftthApplications.store');
    Route::get('ftthApplications/{id}', 'ApplicationsController@show')->name('ftthApplications.show');
    Route::get('ftthApplications/{id}/edit', 'ApplicationsController@edit')->name('ftthApplications.edit');
    Route::patch('ftthApplications}/applicationbankingdetails', 'ApplicationsController@applicationbankingdetails')->name('ftthApplications.applicationbankingdetails');
    Route::patch('ftthApplications}/mainapplication', 'ApplicationsController@mainapplication')->name('ftthApplications.mainapplication');
    Route::patch('ftthApplications}/applicationservice', 'ApplicationsController@applicationservice')->name('ftthApplications.applicationservice');
    Route::delete('ftthApplications/{id}/destroy', 'ApplicationsController@destroy')->name('ftthApplications.destroy');

            Route::group(['middleware' => 'isAdmin'], function () {


                Route::get('locations', 'LocationController@index')->name('locations.index');
                Route::get('locations/create', 'LocationController@create')->name('locations.create');
                Route::post('locations/store', 'LocationController@store')->name('locations.store');
                Route::get('locations/{id}/edit', 'LocationController@edit')->name('locations.edit');
                Route::get('locations/{id}', 'LocationController@show')->name('locations.show');
                Route::patch('locations/{location}/update', 'LocationController@update')->name('locations.update');
                Route::delete('locations/{id}/destroy', 'LocationController@destroy')->name('locations.destroy');
                                                    //Ftth Locations
                
                Route::get('ftth-locations', 'FtthLocationController@index')->name('ftthLocations.index');
                Route::get('ftth-locations/create', 'FtthLocationController@create')->name('ftthLocations.create');
                Route::post('ftth-locations/store', 'FtthLocationController@store')->name('ftthLocations.store');
                Route::get('ftth-locations/{id}/edit', 'FtthLocationController@edit')->name('ftthLocations.edit');
                Route::get('ftth-locations/{id}', 'FtthLocationController@show')->name('ftthLocations.show');
                Route::patch('ftth-locations/{ftthLocation}/update', 'FtthLocationController@update')->name('ftthLocations.update');
                Route::delete('ftth-locations/{id}/destroy', 'FtthLocationController@destroy')->name('ftthLocations.destroy');
                
                                                    //Prepaid Packages
                Route::get('prepaid-packages', 'PackagesController@prepaidPackages')->name('prepaidPackages.list');
                Route::post('prepaid-packages/store', 'PrepaidPackages@storePrepaidPackage')->name('prepaidPackages.store');
                Route::get('prepaid-packages/{id}/edit', 'PrepaidPackages@editPrepaidPackage')->name('prepaidPackages.edit');
                Route::patch('prepaid-packages/{prepaidPackage}/update', 'PrepaidPackages@updatePrepaidPackage')->name('prepaidPackages.update');
                Route::post('prepaid-packages/{id}/destroy', 'PrepaidPackages@destroyPrepaidPackage')->name('prepaidPackages.destroy');
                
                                                    //Contract Packages
                Route::get('contract-packages', 'PackagesController@contractPackages')->name('contractPackages.list');
                Route::post('contract-packages/store', 'PrepaidPackages@storeContractPackage')->name('contractPackages.store');
                Route::get('contract-packages/{id}/edit', 'PrepaidPackages@editContractPackage')->name('contractPackages.edit');
                Route::patch('contract-packages/{prepaidPackage}/update', 'PrepaidPackages@updateContractPackage')->name('contractPackages.update');
                Route::post('contract-packages/{id}/destroy', 'PrepaidPackages@destroyContractPackage')->name('contractPackages.destroy');
                
                                                     //package lookup
                Route::get('packages', 'PackagesLookupController@index')->name('packagesLookups.index');
                Route::post('packages/store', 'PackagesLookupController@store')->name('packagesLookups.store');
                Route::get('packages/create', 'PackagesLookupController@create')->name('packagesLookups.create');
                Route::get('packages/{id}/edit', 'PackagesLookupController@edit')->name('packagesLookups.edit');
                Route::get('packages/{id}', 'PackagesLookupController@show')->name('packagesLookups.show');
                Route::patch('packages/{packages_lookup}/update', 'PackagesLookupController@update')->name('packagesLookups.update');
                Route::delete('packages/{id}/destroy', 'PackagesLookupController@destroy')->name('packagesLookups.destroy');
 
                //Route::resource('ftthLocations', 'FtthLocationController');
                //Route::resource('locations', 'LocationController');
                //Route::resource('packagesLookups', 'PackagesLookupController');
                // Route::resource('ftthApplications', 'FtthApplicationController');

        
                Route::resource('users', 'UserController');
            });


    

});