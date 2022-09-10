<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

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
    return view('frontview/index');
});

//admin
Route::get('beranda', [HomeController::class, 'showBeranda']);
Route::get('kategori', [HomeController::class, 'showKategori']);
Route::get('promo', [HomeController::class, 'showPromo']);
Route::get('pelanggan', [HomeController::class, 'showPelanggan']);
Route::get('supplier', [HomeController::class, 'showSupplier']);
Route::get('login', [AuthController::class, 'showLogin']);

//frontview
Route::get('index', [ClientController::class, 'showIndex']);
Route::get('cart', [ClientController::class, 'showCart']);
Route::get('shop', [ClientController::class, 'showShop']);
Route::post('shop/filter', [ClientController::class, 'filter']);
Route::post('shop/filter2', [ClientController::class, 'filter2']);
Route::post('shop/sortby', [ClientController::class, 'sortBy']);
Route::get('single', [ClientController::class, 'showSingle']);
Route::get('single/{produk}', [ClientController::class, 'showSingle']);

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::post('produk/filter', [ProdukController::class, 'filter']);
    Route::get('produk-delete/{produk}', [ProdukController::class, 'destroy']);
    Route::resource('produk', ProdukController::class);
    Route::resource('user', UserController::class);
});


Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'loginProcess']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('test-collection', [HomeController::class, 'testCollection']);