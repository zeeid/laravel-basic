<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

// ==== KONTROLLER DALAM FOLDER==
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\ParkirController;
use App\Http\Controllers\Api\ProsesController;

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
// Route::get('/', [UtamaController::class,'index']);

Route::get('/', [LoginController::class,'index']);
Route::get('/login', [LoginController::class,'index']);

// ===VIEW==
Route::get('/register', [RegisterController::class,'index']);
Route::get('/show', [RegisterController::class,'show']);
Route::get('/update', [RegisterController::class,'update']);
Route::get('/delete', [RegisterController::class,'delete']);

// == DASHBOARD==
Route::get('/dashboard', [DashboardController::class,'index']);

// == MENU==
Route::post('/api/menu', [MenuController::class,'index']);

// === API TARIF==
Route::post('/api/proses/simpan-tarif', [ProsesController::class,'simpanjenistarif']);
Route::get('/api/proses/get-tarif', [ProsesController::class,'showjenistarif']);
Route::post('/api/proses/hapus-tarif', [ProsesController::class,'hapustarif']);

// === API PARKIR===
Route::get('/api/proses/i-parkir', [ParkirController::class,'index']);
Route::post('/api/proses/simpan-parkir', [ParkirController::class,'simpanparkir']);
Route::get('/api/proses/get-parkir', [ParkirController::class,'showparkir']);
Route::post('/api/proses/bayar-parkir', [ParkirController::class,'bayarparkir']);


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
