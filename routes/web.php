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
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/json/masakan' , 'MasakanController@json')->name('json_masakan');
Route::get('/json/order' , 'OrderController@json')->name('json_order');

Route::group(['middleware' => 'admin'],function (){
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/meja' , 'AdminController@meja')->name('meja');

	Route::resource('/admin/masakan', 'MasakanController');
	Route::get('/admin/masakan', 'AdminController@masakan')->name('adminmasakan');
});



Route::group(['middleware' => 'waiter'], function() {
	Route::get('/waiter', 'WaiterController@index')->name('waiter');

	// Route::get('/waiter/json' , 'MasakanController@json')->name('json_masakan');
	Route::resource('/waiter/masakan', 'MasakanController');
	Route::get('/waiter/masakan', 'WaiterController@masakan')->name('waitermasakan');
	Route::resource('/waiter/order', 'OrderController');
	Route::resource('/waiter/detail_order', 'Detail_OrderController');
});

Route::get('/kasir', 'KasirController@index')->name('kasir')->middleware('kasir');
Route::get('/owner', 'OwnerController@index')->name('owner')->middleware('owner');
Route::get('/pembeli', 'PembeliController@index')->name('pembeli')->middleware('pembeli');

// Route::get('/home', 'HomeController@index')->name('home');
