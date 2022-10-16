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


Route::get('/', function() {
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /**
     * Settings
     */
    Route::get('/settings', 'SettingsController@create')->name('app.settings');
    Route::post('/settings', 'SettingsController@store')->name('app.settings.store');

});

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix'	=>	'/admin'], function () {

    Route::resource('drivers', 'DriverController');

    Route::resource('trucks', 'TruckController');

    Route::get('alerts', 'AdminController@alerts')->name('alerts');

    Route::resource('companies', 'CompanyController');

    Route::resource('sites', 'SiteController');

    Route::post('/trucks/print', 'TruckController@print_barcodes')->name('truck.barcode.print');

    Route::post('/trucks/delete/batch', 'TruckController@destroy_batch')->name('truck.destroy.batch');

});

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix'  =>  '/accounts'], function () {

    Route::get('alerts', 'AccountsController@index')->name('accounts.index');

    Route::get('alerts/create', 'AccountsController@create')->name('accounts.create');
    Route::post('alerts/create', 'AccountsController@store')->name('accounts.store');

    Route::get('alerts/{id}/destroy', 'AccountsController@destroy')->name('accounts.destroy');

});

Route::group(['middleware'	=>	'auth', 'prefix' => '/shipment'], function() {
	
    Route::get('/', 'ShipmentController@index')->name('shipment');

    Route::get('/list', 'ShipmentController@shipments_by_user')->name('shipment.list');

    Route::post('/store', 'ShipmentController@store')->name('shipment.store');

	Route::get('/print/{uid}', 'ShipmentController@print_by_uid')->name('shipment.print');

});

Route::group(['middleware'  =>  'auth', 'prefix' => 'ajax'], function() {
    
    Route::get('truck', 'TruckController@truck_by_barcode')->name('truck.get');

});

