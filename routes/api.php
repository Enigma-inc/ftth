<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ftth-locations', 'FtthLocationAPIController');
Route::resource('locations', 'LocationAPIController');

Route::resource('packages_lookups', 'PackagesLookupAPIController');
Route::post('place-application', 'FtthApplicationAPIController@store');

Route::resource('users', 'UserAPIController');


