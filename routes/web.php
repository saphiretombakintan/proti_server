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

Route::get('/dashboard', 'T001Controller@index')->name('dashboard');

Route::get('/in', 'AuthT001\LoginController@loginAdmin');
Route::post('/in', 'AuthT001\LoginController@login');

Route::get('/regadmin', 'AuthT001\RegisterController@regAdmin');
Route::post('/regadmin', 'AuthT001\RegisterController@create');

Route::get('/finish', 'VTController@finishVT');
Route::get('/fail', 'VTController@failVT');

//TABLE MASTER
Route::get('/unit', 'Master\UnitController@index');
Route::get('/harga', 'Master\HargaController@index');
Route::get('/carabayar', 'Master\CarabayarController@index');
Route::post('/carabayar/post', 'Master\CarabayarController@store');
Route::put('/carabayar/update/{id}', 'Master\CarabayarController@update');
Route::delete('/carabayar/del/{id}', 'Master\CarabayarController@destroy');

//TABLE TRANSAKSI
Route::get('/booking', 'Transaksi\BookingController@index');
Route::get('/booking/pdf/{code}', 'Transaksi\BookingController@generate_pdf');
Route::get('/booking/pdf/test', function () {
	return view('transaksi.pdf');
});

Route::get('/berkas', 'BerkasController@index');
Route::post('berkas/post', 'BerkasController@store')->name('berkas.post');
// Route::post('produk/cetak', 'ProdukController@printBarcode');
Route::resource('berkas', 'BerkasController');

Route::get('/sp3k', 'Sp3kController@index');
Route::post('sp3k/post', 'Sp3kController@store')->name('sp3k.post');
Route::resource('sp3k', 'Sp3kController');

Route::get('/akad', 'AkadController@index');
Route::post('akad/post', 'AkadController@store')->name('akad.post');
Route::resource('akad', 'AkadController');

Route::get('/sold', 'SoldController@index');
Route::post('sold/post', 'SoldController@store')->name('sold.post');
Route::resource('sold', 'SoldController');


Route::post('/booking/del/{id}', 'Transaksi\BookingController@destroy')->name('booking.del');

Route::get('/angsuran', 'Transaksi\AngsuranController@index');
Route::get('/angsuran/view', 'Transaksi\AngsuranController@transaksi')->name('angsuran.view');
Route::get('/angsuran/view/{id}', 'Transaksi\AngsuranController@detail');
Route::post('/angsuran/post/{code}', 'Transaksi\AngsuranController@store')->name('angsuran.post');
Route::post('/angsuran/delete/{code}', 'Transaksi\AngsuranController@destroy')->name('angsuran.del');

Route::get('/angsuran/detail', 'Transaksi\AngsuranDetailController@index')->name('angsuran_detail.get');
Route::get('/angsuran/detail/{code}/{type}', 'Transaksi\AngsuranDetailController@detail');
Route::get('/angsuran/detail/save', 'Transaksi\AngsuranDetailController@save');
Route::post('/angsuran/detail/post', 'Transaksi\AngsuranDetailController@store')->name('angsuran_detail.post');

Route::get('/paymentype', function () {

	return view('paymentype');
});

Route::get('/sample', 'TransaksiController@index');

Route::get('/inputcarabayar', function () {

	return view('inputcarabayar');
});

Route::get('/closeunit', 'T001Controller@closeUnit');

Route::resource('transaksi', 'transaksicontroller');
