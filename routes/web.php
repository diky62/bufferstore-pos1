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
    return view('auth/login');
});


// Route::get('check',function(){
// 	switch (Auth::user()->role_id) {
// 		case '1':
// 			return redirect('/dashboard?login=true');
// 			break;
// 		case '2':
// 			return redirect('/dashboardadmin?login=true');
// 			break;
		
// 		default:
// 			# code...
// 			break;
// 	}
// });

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



Route::group(['middleware'=>'auth'],function(){   
  Route::resources([
    "home"=>"Superadmin\HomeController",
    "ekspedisi"=>"Superadmin\EkspedisiController",
    "marketplace"=>"Superadmin\MarketplaceController",
    "kategori"=>"Superadmin\KategoriBarangController",
    "stok_barang"=>"Superadmin\StokBarangController",
    "user"=>"Superadmin\UserController",
    "barang_masuk"=>"Superadmin\BarangMasukController",
    "barang_keluar"=>"Superadmin\BarangKeluarController",
    "laporan"=>"Superadmin\LaporanController",
    ]);
  	Route::post('/cart', 'Superadmin\CartController@store')->name('cart.store');
	Route::patch('/cart/{cart}', 'Superadmin\CartController@update')->name('cart.update');
	Route::delete('/cart/{cart}', 'Superadmin\CartController@destroy')->name('cart.destroy');
    Route::get('/product/{id}', 'BarangKeluarController@getProduct');
    Route::post('/transaction', 'Superadmin\TransactionController@store')->name('transaction.store');
    Route::post('laporan/show','Superadmin\LaporanController@show')->name('laporan.show');
    // Route::get('/ordertour/cetak/{id}','Owner\OrderTourController@cetak')->name('ordertour.cetak');
    // Route::get('/orderbus/cetak/{id}','Owner\OrderBusController@cetak')->name('orderbus.cetak');
    // Route::get('/order_shuttle/cetak/{id}','Owner\OrderShuttleController@cetak')->name('order_shuttle.cetak');
    // Route::post('laporan_shuttle/show','Owner\LaporanShuttleController@show')->name('laporan_shuttle.show');
    // // Route::get('/laporan_shuttle/cetak_pdf', 'Owner\LaporanShuttleController@cetak_pdf')->name('laporan_shuttle.cetak_pdf');
    // Route::get('orderbus/pembayaran','Owner\OrderBusController@pembayaran')->name('orderbus.pembayaran');
    // Route::get('laporan-pdf','Owner\LaporanShuttleController@pdf')->name('laporan_shuttle.pdf');
    // Route::get('orderbus_pdf','Owner\OrderBusController@pdf')->name('orderbus.pdf');
    // Route::get('ordertour_pdf','Owner\OrderTourController@pdf')->name('ordertour.pdf');

    
});