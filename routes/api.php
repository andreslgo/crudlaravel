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


Route::get('/countries', 'CountriesController@get');
Route::get('/cities/{idCountry}', 'CitiesController@get');
Route::get('/customertypes', 'CustomerTypesController@get');
Route::get('/customers', 'CustomersController@get');
Route::get('/customers/{idCustomer}', 'CustomersController@getOne');
Route::post('/customers', 'CustomersController@create');
Route::put('/customers', 'CustomersController@update');
Route::delete('/customers/{idCustomer}', 'CustomersController@delete');