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
    return view('welcome');
});

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

Route::get('/kategori','KategoriController@index')->name('kategori.index');
Route::get('/kategori/create','KategoriController@create')->name('kategori.create');
Route::post('/kategori/store','KategoriController@store')->name('kategori.store');
Route::get('/kategori/edit/{id}','KategoriController@edit')->name('kategori.edit');
Route::post('/kategori/update/{id}','KategoriController@update')->name('kategori.update');
Route::get('/kategori/destroy/{id}','KategoriController@destroy')->name('kategori.destroy');
Auth::routes();

Route::get('/produk','ProdukController@index')->name('produk.index');
Route::get('/produk/create','ProdukController@create')->name('produk.create');
Route::post('/produk/store','ProdukController@store')->name('produk.store');
Route::get('/produk/edit/{id}','ProdukController@edit')->name('produk.edit');
Route::post('/produk/update/{id}','ProdukController@update')->name('produk.update');
Route::get('/produk/destroy/{id}','ProdukController@destroy')->name('produk.destroy');

Route::get('/home', 'HomeController@index')->name('home');

