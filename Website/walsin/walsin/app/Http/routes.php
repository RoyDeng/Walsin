<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {

    return view('welcome');

});*/

Route::group(['middleware'=>'auth'],function(){
	Route::get('/', 'HomeController@index');
	Route::get('mo', 'ShowDataController@getMoData');
	Route::get('mo_details/{o_id}', 'ShowDataController@getMoDetails');
	Route::get('error', 'ShowDataController@getErrorData');
	Route::get('stock', 'ShowDataController@getStockData');
	Route::get('procure', 'ShowDataController@getProcureData');
	Route::get('import', 'ShowDataController@getImportData');
	Route::get('pick', 'ShowDataController@getPickData');
	Route::get('test', 'ShowDataController@getTestData');
	Route::get('carry', 'ShowDataController@getCarryData');
	Route::get('storage', 'ShowDataController@getStorageData');
	Route::get('export', 'ShowDataController@getExportData');
	Route::get('order', 'ShowDataController@getOrderData');
	Route::get('search', 'ShowDataController@getSearchResult');
	Route::get('edit/{o_id}', 'MoController@editMo');
	Route::post('add/{o_id}', 'MoController@addItem');
	Route::get('remove/{mo_id}', 'MoController@removeItem');
	Route::get('update/{o_id}', 'MoController@updateOrder');
	Route::get('editparm/{w_id}', 'WorkStationController@editWorkStation');
	Route::post('addparm/{w_id}', 'WorkStationController@addWorkStation');
});

Route::get('ps', 'JSONController@getItem');
Route::get('update', 'JSONController@updateData');
Route::get('updateparm', 'WorkStationController@updateTemp');
Route::get('alert', 'JSONController@getError');

Route::auth();