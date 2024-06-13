<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('Layouts/index');
});

Route::get('dashboard', function () {
    return view('Layouts/dashboard');
});


//Route Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Route Login 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', function () {
    return view('welcome');
});

//Route CRUD Menu
Route::get('/index', [MenuController::class, 'index']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/menu-entry', [MenuController::class, 'create']);
Route::post('/menu-proses', [MenuController::class, 'store']);
Route::get('/menu-edit/{id}', [MenuController::class, 'edit']);
Route::put('/menu-update/{id}', [MenuController::class, 'update']);
Route::get('/menu-hapus/{id}', [MenuController::class, 'destroy']);

//Route Transaksi
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/pesanan', [TransactionController::class, 'pesan']);
Route::get('/transaction-entry', [TransactionController::class, 'create']);
Route::post('/transaction-proses', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction-edit/{id}', [TransactionController::class, 'edit']);
Route::put('/transaction-update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
Route::get('/transaction-hapus/{id}', [TransactionController::class, 'destroy']);
