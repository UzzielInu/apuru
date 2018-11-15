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
    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/getos', 'OperativeSystemController@getdata')->name('os.getdata');
Route::resource('/os', 'OperativeSystemController');
Route::get('/getantivirus', 'AntivirusController@getdata')->name('antivirus.getdata');
Route::resource('/antivirus','AntivirusController');
Route::get('/getmodeldevice','ModelDeviceController@getdata')->name('modeldevice.getdata');
Route::resource('/modeldevice','ModelDeviceController');
Route::get('/gettype','TypeController@getdata')->name('type.getdata');
Route::resource('/type','TypeController');
Route::get('/getservice','ServiceController@getdata')->name('service.getdata');
Route::resource('/service','ServiceController');
Route::get('/getlocation','LocationController@getdata')->name('location.getdata');
Route::resource('/location','LocationController');
Route::get('/gethouseholder','HouseHolderController@getdata')->name('householder.getdata');
Route::resource('/householder','HouseHolderController');
Route::get('/getusers','UserController@getdata')->name('users.getdata');
Route::resource('/users','UserController');

Route::resource('/devices', 'DevicesController');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
