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

/**
Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});
 * 
 */
Route::post('login', 'APIController@login');
Route::post('register', 'APIController@register');

Route::group(['middleware' => 'auth.jwt'], function () {

Route::get('','Reports@agePerFarmer');

Route::get('/avgCrop','Reports@seedlingsPerCrop');

Route::get('/avgDependant','Reports@avgDependant');

Route::get('/seedlingsPerCrop','Reports@seedlingsPerCrop');

Route::post('', 'AnnotationController@annotateImage');

});

Route::get('','Reports@agePerFarmer');

Route::get('/avgCrop','Reports@seedlingsPerCrop');

Route::get('/avgDependant','Reports@avgDependant');

Route::get('/seedlingsPerCrop','Reports@seedlingsPerCrop');
