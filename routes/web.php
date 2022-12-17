
<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\loginController;

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


Route::get('/home', function () {
    return view('content.dashboard');
});
Route::get('/', function () {
    return view('content.dashboard');
});
Route::get('/daftar-kegiatan', function () {
    return view('content.kegiatan.indexKegiatan');
});
// ANGGOTA
Route::get('/anggota', [userController::class, 'index']);
Route::get('/tambah-anggota', [userController::class, 'create']);
Route::post('/upload-anggota', [userController::class, 'store']);
Route::post('/update-anggota', [userController::class, 'update']);
Route::get('/edit-anggota/{id}', [userController::class, 'edit']);
Route::delete('/hapus-anggota/{id}', [userController::class, 'destroy']);

Route::get('/pns', function () {
    return view('content.anggota.pns');
});
Route::get('/honorer', function () {
    return view('content.honorer');
});
// KEGIATAN


Route::get('/kegiatan', [kegiatanController::class, 'index']);
Route::get('/tambah-kegiatan', [kegiatanController::class, 'create']);
Route::post('/upload-kegiatan', [kegiatanController::class, 'store']);
Route::post('/update-kegiatan', [kegiatanController::class, 'update']);
Route::get('/edit-kegiatan/{id}', [kegiatanController::class, 'edit']);
Route::delete('/hapus-kegiatan/{id}', [kegiatanController::class, 'destroy']);

// EDIT PROFILE
Route::get('/edit-profile/{id}', [userController::class, 'editProfile']);
Route::post('/update-profile', [userController::class, 'updateProfile']);




// Login user
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [loginController::class, 'authenticate']);
Route::post('/logout', [loginController::class, 'logout']);
