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
    return view('auth.login');
});

Auth::routes();
//report
//Route::get('/','Reports@agePerFarmer');
Route::get('/avgCrop','Reports@seedlingsPerCrop');
Route::get('/avgDependant','Reports@avgDependant');
Route::get('/seedlingsPerCrop','Reports@seedlingsPerCrop')->name('report.cropsum');
Route::get('/seedlingsPerDistrict','Reports@seedlingsPerDistrict')->name('report.distsum');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/institution/add', 'InstitutionController@create')->name('institution.add');
Route::get('/institution/index', 'InstitutionController@index')->name('institution.index');
Route::get('/institution/edit/{id}', 'InstitutionController@edit')->name('institution.edit');
Route::get('/institution/view/{id}', 'InstitutionController@view')->name('institution.view');
//employee
Route::get('/employee/add/{id}', 'EmployeeController@create')->name('employee.add');
Route::get('/employee/index/{id}', 'EmployeeController@index')->name('employee.index');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::get('/employee/view/{id}', 'EmployeeController@view')->name('employee.view');
Route::get('/employee/delete/{id}', 'EmployeeController@destroy')->name('employee.delete');
Route::get('/employee/pdf/{id}', 'EmployeeController@pdf')->name('employee.pdf');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
Route::resource('Institution', 'InstitutionController',['except'=>['show','create','store']]);
Route::resource('employee', 'EmployeeController',['except'=>['show','create','store','index']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
   Route::resource('users', 'UserController',['except'=>['show','create','store']]); 
   
});

//OCR
Route::get('/annotate', 'AnnotationController@displayForm');
Route::post('/annotate', 'AnnotationController@annotateImage');
