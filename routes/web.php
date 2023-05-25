<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
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
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);
    Route::get('/siswa/export-excel', [SiswaController::class, 'exportExcel']);
});
//Route::post('/siswa/create', 'SiswaController@create');

//rating route
//Route::get('/rating',[ratingController::class,'index']);
Route::get('/rating', 'App\Http\Controllers\ratingController@index');
Route::post('/rating/create', 'App\Http\Controllers\ratingController@create');
