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
	return view('home');
});

Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'CheckAdmin'],function(){
	// Route::get('/list',function(){
	// 	return view('admin.listProduct');
	// });
	Route::get('/list','ProductControll@getList');
	Route::get('/add','ProductControll@getAdd');
	Route::post('/add','ProductControll@postAdd');
	Route::get('/edit/{id}','ProductControll@getEdit')->where('id', '[0-9]+');
	Route::post('/edit/{id}','ProductControll@postEdit')->where('id', '[0-9]+');
	Route::get('/delete/{id}','ProductControll@deleteProduct')->where('id', '[0-9]+');
});

// Route::post('/login','AuthLoginControll@postLogin')->name('login');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail/{id}','HomeController@showDetail');
