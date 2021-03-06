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
//->middleware('auth', 'role:admin');
Route::get('/', function () {
    return redirect('login');
});
Auth::routes();
//routes for admins
Route::group(['middleware' => ['auth', 'role:admin']], function() {
  Route::get('/home', 'HomeController@index')->name('home.index');
  Route::get('/getusers','UserController@getdata')->name('users.getdata');
  Route::resource('/users','UserController');
  Route::get('/logs/getlogin', 'LoginLogController@getlogin')->name('logs.getlogin');
  Route::resource('/logs/login', 'LoginLogController');
});
//routes for users
Route::group(['middleware' => ['auth', 'role:user' OR 'role:admin']], function() {
  Route::get('/test', 'HomeController@test')->name('home.test');
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
  Route::get('/getdevice','DevicesController@getdata')->name('device.getdata');
  Route::resource('/device', 'DevicesController');
  Route::get('/getticket','TicketController@getdata')->name('ticket.getdata');
  Route::resource('/ticket', 'TicketController');
  Route::get('/selectRol', 'UserController@selectRol')->name('user.selectRol');
  Route::post('/validateRol/{role}', 'UserController@validateRol')->name('user.validate');  
});
