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

Route::get('/', 'ClientController@index');
Route::get('/tampilProduk', 'ClientController@tampilProduk');
Route::get('/tampilSlider', 'ClientController@tampilSlider');
Route::get('/tampilSliderSide', 'ClientController@tampilSliderSide');
Route::get('/detail/{id}', 'ClientController@detail')->name('detail');
Route::get('/countCart', 'ClientController@countCart')->name('count_cart');
Route::post('/simpanCart', 'ClientController@insertCart')->name('simpan_cart');
Route::get('/order', 'ClientController@order')->name('order');
Route::get('/orderData', 'ClientController@orderData')->name('order_data');
Route::get('/pembayaran', 'ClientController@pembayaran')->name('pembayaran');
Route::get('/metodePembayaran', 'ClientController@metodePembayaran')->name('metode_pembayaran');
Route::get('/register_customer', 'ClientController@register')->name('register_customer');
Route::get('/login_customer', 'ClientController@login')->name('login_customer');

Route::get('/session/tampil','SessionController@tampilkanSession');
Route::get('/session/buat','SessionController@buatSession');
Route::get('/session/hapus','SessionController@hapusSession');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('kategori/{id}/delete', 'KategoriController@hapus')->name('kategori.hapus');
    Route::resource('kategori', 'KategoriController');

    Route::get('kontak/{id}/delete', 'KontakController@hapus')->name('kontak.hapus');
    Route::resource('kontak', 'KontakController');

    Route::get('produk/{id}/delete', 'ProdukController@hapus')->name('produk.hapus');
    Route::resource('produk', 'ProdukController');

    Route::get('slider/{id}/delete', 'SliderController@hapus')->name('slider.hapus');
    Route::resource('slider', 'SliderController');
});
