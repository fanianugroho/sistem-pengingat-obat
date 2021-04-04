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
    return redirect()->route('welcome');
});

Auth::routes();
/* Route::group(['middleware' => ['auth','verified','web','CheckRole:apoteker']],function(){ */
Route::resource('user', 'UserController');
Route::get('/user.all', 'UserController@all')->name('user.all');
Route::get('/user.ubahPassword', 'UserController@indexPassword')->name('user.indexPassword');
Route::post('/user.updatePassword', 'UserController@ubahPassword')->name('user.ubahPassword');
Route::get('/obat.all', 'ObatController@all')->name('obat.all');
Route::resource('obat', 'ObatController');
Route::get('/detailObatEdit/{id}', 'ObatController@detailObatEdit')->name('detailObatEdit');
Route::get('/detailObat/{id}', 'ObatController@detailobat')->name('detailobat');
Route::get('/bentukobat.all', 'BentukObatController@all')->name('bentukobat.all');
Route::resource('bentukobat', 'BentukObatController');
Route::get('/interaksiobat.all', 'InteraksiObatController@all')->name('interaksiobat.all');
Route::resource('interaksiobat', 'InteraksiObatController');
Route::get('/fungsiobat.all', 'FungsiObatController@all')->name('fungsiobat.all');
Route::resource('fungsiobat', 'FungsiObatController');
Route::get('/efeksampingobat.all', 'EfekSampingObatController@all')->name('efeksampingobat.all');
Route::resource('efeksampingobat', 'EfekSampingObatController');
Route::get('/kontraindikasiobat.all', 'KontraindikasiObatController@all')->name('kontraindikasiobat.all');
Route::resource('kontraindikasiobat', 'KontraindikasiObatController');
Route::get('/pasien.all', 'PasienController@all')->name('pasien.all');
Route::resource('pasien', 'PasienController');
Route::get('/beranda', 'DashboardController@index')->name('beranda');
Route::get('/riwayatresep.all', 'RiwayatResepController@all')->name('riwayatresep.all');
Route::resource('riwayatresep', 'RiwayatResepController');
Route::get('/detailResep/{id}', 'RiwayatResepController@detailresep')->name('detailresep');
Route::get('/resep.all/{id}', 'ResepController@all')->name('resep.all');
Route::post('/tambahObat/{id}', 'ResepController@store_obat')->name('resep.store_obat');
Route::post('/search-pasien','ResepController@searchPasien')->name('searchPasien');
Route::get('/detailPasien/detailObatResep/{id}', 'ResepController@viewdetailobatresep')->name('viewdetailobatresep');
// Route::get('/detailPasien/detailObatResep/tambah{id}', 'ResepController@viewdetailobatresep')->name('viewdetailobatreseptambah');
Route::get('/detailObatResep/{id}', 'ResepController@detailobatresep')->name('detailobatresep');
Route::get('/detailPasien/{id}', 'ResepController@detailpasien')->name('detailpasien');
Route::resource('resep', 'ResepController');
Route::get('/cetak-resep','ResepController@cetakPdf')->name('cetak-resep');
Route::get('/welcome', 'DashboardController@tampilanawal')->name('welcome');



/* }); */
