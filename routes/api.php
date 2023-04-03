<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\MahasiswaController;
use App\http\Controllers\JurusanController;
use App\http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getmahasiswa',[MahasiswaController::class,"getmahasiswa"]);
Route::get('/getid/{id}',[MahasiswaController::class,"getid"]);
Route::post('/create_mahasiswa',[MahasiswaController::class,"create_mahasiswa"]);
Route::put('/update_mahasiswa/{id}',[MahasiswaController::class,"update_mahasiswa"]);
Route::delete('/delete_mahasiswa/{id}',[MahasiswaController::class,"delete_mahasiswa"]);

Route::get('/getbuku',[BukuController::class,"getbuku"]);
Route::get('/getid/{id}',[BukuController::class,"getid"]);
Route::post('/create_buku',[BukuController::class,"create_buku"]);
Route::put('/update_buku/{id}',[BukuController::class,"update_buku"]);
Route::delete('/delete_buku/{id}',[BukuController::class,"delete_buku"]);

Route::get('/getjurusan',[JurusanController::class,"getjurusan"]);