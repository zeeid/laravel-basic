<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\RegisterController;

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

// ===== ROUTE PAKAI KONTROLLER =====
Route::get('/', [UtamaController::class,'index']);

Route::get('/login', [LoginController::class,'index']);

// ===VIEW==
Route::get('/register', [RegisterController::class,'index']);
Route::get('/show', [RegisterController::class,'show']);
Route::get('/update', [RegisterController::class,'update']);
Route::get('/delete', [RegisterController::class,'delete']);


// ==== POST =====
Route::post('/register', [RegisterController::class,'pendaftaran']);




Route::get('/awalan', function () {

    $data = [
        'data1'=> 'DATA 1',
        'data2'=> 'DATA 2',
        'judul'=> 'AWALAN',
    ];

    return view('awalan',$data);
});
