<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Auth;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("user")->group(function(){
    Route::get("/", [UserController::class, 'index']);
    Route::post("/add",[UserController::class,'store'])->name("user.add"); //{{ route('user.latihan')}}
    Route::get("/list",[UserController::class,'index'])->name('user.list');
    Route::put("/edit/{user}",[UserController::class,'update'])->name("user.edit");
    Route::delete("/delete/{user}",[UserController::class,'destroy'])->name("user.delete");

});

Route::prefix("barang")->group(function(){
    Route::get("/list", [BarangController::class, 'index'])->name("barang.list");
    Route::post("/add", [BarangController::class, 'store'])->name("barang.add");
    Route::put("/edit/{barang}", [BarangController::class, 'update'])->name("barang.edit");
    Route::delete("/delete/{barang:id}", [BarangController::class, 'destroy'])->name("barang.delete");
});

Route::prefix("topup")->group(function(){
    Route::get("/",[TopupController::class, 'index'])->name("topup.index");
    Route::get("/check",[TopupController::class, 'check'])->name("topup.check");
});

Route::prefix('transaksi')->group(function(){
    Route::get("/", [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post("/create", [TransaksiController::class, 'store'])->name("transaksi.store");
});

Route::prefix("bank")->group(function(){
    Route::get("/", [BankController::class, 'get_transaksi'])->name("bank.index");

});

Route::prefix("transaction")->group(function(){
    Route::get("/", [TransactionController::class, 'index'])->name("transaction.index");
    Route::post("/create", [TransactionController::class, 'store'])->name("transaction.create");
});

