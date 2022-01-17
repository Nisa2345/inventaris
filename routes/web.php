<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangmasukController;
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
    return view('welcome');
});

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hanya untuk role admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', function(){
        return 'halaman admin';
    });

    Route::get('profile', function(){
        return 'halaman profile admin';
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('lab', function(){
        return view('lab.index');
    })->middleware(['role:admin']);

    Route::get('bengkel', function(){
        return view('bengkel.index');
    })->middleware(['role:admin']);

    Route::resource('barang', barangController::class)->middleware(['role:admin']);
    Route::resource('kategori', kategoriController::class)->middleware(['role:admin']);

});
