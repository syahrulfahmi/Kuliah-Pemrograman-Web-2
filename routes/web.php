<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MapelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use GuzzleHttp\Promise\Create;
use Monolog\Handler\RotatingFileHandler;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/second', function () {
    return view('second');
});

Route::get('/second/time', function () {
    return view('secondtime');
});

//Route::get('/rating','RatingController@index');
// Route::get('/dashboard', 'DashboardController@index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

//Grouping
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/ascending', [SiswaController::class, 'ascendingNama']);
    Route::get('/siswa/descending', [SiswaController::class, 'descendingNama']);
    Route::get('/siswa/search', [SiswaController::class, 'searchSiswaNama'])->name('search.siswa');
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);
    Route::get('/siswa/export-excel', [SiswaController::class, 'exportExcel']);
    Route::get('/siswa/export-pdf', [SiswaController::class,'exportPdf']);
    Route::get('/siswa/pdf', [SiswaController::class,'pdf']);
    Route::post('/siswa/{id}/addnilai',[SiswaController::class, 'addnilai']);
    Route::get('/siswa/{id}/export-pdf-siswa', [SiswaController::class,'exportSiswaPdf']);
    //Route Mapel
    Route::get('/mapel',[MapelController::class, 'index']);
    Route::post('/mapel/create',[MapelController::class , 'create']);
    Route::get('/mapel/{id}/edit',[MapelController::class, 'edit']);
    Route::post('/mapel/{id}/update',[MapelController::class, 'update']);
    Route::get('/mapel/{id}/delete',[MapelController::class, 'delete']);

    //informasi
    Route::get('/informasi',[InformasiController::class,'index']);
    Route::post('/informasi/create',[InformasiController::class,'create']);
    Route::get('/informasi/{id}/edit',[InformasiController::class,'edit']);
    Route::post('/informasi/{id}/update',[InformasiController::class,'update']);
    Route::get('/informasi/{id}/delete',[InformasiController::class,'delete']);

    //trySearch
});
//Route::post('/siswa/create', 'SiswaController@create');

//rating route
//Route::get('/rating',[ratingController::class,'index']);
Route::get('/rating', 'App\Http\Controllers\ratingController@index');
Route::post('/rating/create', 'App\Http\Controllers\ratingController@create');
