<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PesanKamiController;

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

/*---------------------
  Home
-----------------------*/

Route::get('/home', function () {
    return view('home');
});

/*-----------------------*/

/*---------------------
  Barang
-----------------------*/

Route::get('/barang-1', function () {
    return view('/barang/barang-1');
});

Route::get('/barang-2', function () {
    return view('/barang/barang-2');
});

Route::get('/barang-3', function () {
    return view('/barang/barang-3');
});

/*-----------------------*/

/*---------------------
  Detail Barang
-----------------------*/

Route::get('/detailbarang-1', function () {
    return view('/detailbarang/detailbarang-1');
});

Route::get('/detailbarang-2', function () {
    return view('/detailbarang/detailbarang-2');
});

Route::get('/detailbarang-3', function () {
    return view('/detailbarang/detailbarang-3');
});

Route::get('/detailbarang-4', function () {
    return view('/detailbarang/detailbarang-4');
});

Route::get('/detailbarang-5', function () {
    return view('/detailbarang/detailbarang-5');
});

Route::get('/detailbarang-6', function () {
    return view('/detailbarang/detailbarang-6');
});

Route::get('/detailbarang-7', function () {
    return view('/detailbarang/detailbarang-7');
});

Route::get('/detailbarang-8', function () {
    return view('/detailbarang/detailbarang-8');
});

/*-----------------------*/

/*---------------------
  Login Register
-----------------------*/

Route::get('/login', [LoginController::class, 'home'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'register'])->name('user.register');

/*-----------------------*/

/*---------------------
  Profile
-----------------------*/

Route::get('/profile', function () {
    return view('profile');
});

Route::post('/update-profile', [ProfileController::class, 'update'])->name('update.profile');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');

Route::delete('/user/{user}', [ProfileController::class, 'destroy'])->name('user.destroy');

/*-----------------------*/

/*---------------------
  Footer
-----------------------*/

Route::post('/newsletter', [NewsletterController::class, 'store']);

/*-----------------------*/

/*---------------------
  Footer
-----------------------*/

Route::get('/kontak', function () {
    return view('kontak');
});

Route::post('/kirim-pesan', [PesanKamiController::class, 'kirimPesan']);


/*-----------------------*/

Route::get('/forum', function () {
    return view('forum');
});

Route::get('/tentang', function () {
    return view('tentang');
});



Route::get('/keranjang', function () {
    return view('keranjang');
});


