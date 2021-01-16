<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('App\Http\Controllers')->middleware('guest')->group(function () {
    Route::prefix('')->group(function () { //you can use prefix if you want
    //   Route::resource('pegawai', PegawaiController::class);

      Route::get('/pegawai', 'PegawaiController@index');
      Route::get('/pegawai/data', 'PegawaiController@show');
      Route::get('/pegawai/modal', 'PegawaiController@showModal');
      Route::post('/pegawai/store', 'PegawaiController@store');
      Route::post('/pegawai/update', 'PegawaiController@update');
      Route::get('/pegawai/hapus/{id}', 'PegawaiController@hapus');


    });
});

