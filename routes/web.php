<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('app.dashboard');
});

Auth::routes();


Route::get('/obat.all', 'ObatController@all')->name('obat.all');
Route::resource('obat', 'ObatController');
Route::get('/bentukobat.all', 'BentukObatController@all')->name('bentukobat.all');
Route::resource('bentukobat', 'BentukObatController');
Route::get('/interaksiobat.all', 'InteraksiObatController@all')->name('interaksiobat.all');
Route::resource('interaksiobat', 'InteraksiObatController');
Route::get('/kontraindikasiobat.all', 'KontraindikasiObatController@all')->name('kontraindikasiobat.all');
Route::resource('kontraindikasiobat', 'KontraindikasiObatController');
Route::get('/pasien.all', 'PasienController@all')->name('pasien.all');
Route::resource('pasien', 'PasienController');
Route::get('/beranda', 'DashboardController@index')->name('beranda');
Route::get('/riwayatresep.all', 'RiwayatResepController@all')->name('riwayatresep.all');
Route::resource('riwayatresep', 'RiwayatResepController');
Route::get('/resep.all', 'ResepController@all')->name('resep.all');
Route::resource('resep', 'ResepController');

