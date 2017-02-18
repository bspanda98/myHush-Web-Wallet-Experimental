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
    return redirect('/dashboard');
});

Auth::routes();

/*
*Dashboard pages Routes
*/

Route::get('/dashboard', 'DashboardController@Index');

Route::get('/dashboard/addresses', 'AddressesController@Index');

Route::post('/dashboard/addresses/new', 'AddressesController@NewAddress');
