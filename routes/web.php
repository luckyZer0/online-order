<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// DB::listen(function ($event) {
//     dump($event->sql);
// });

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store');
});

Route::controller(OrderDetailController::class)->group(
    function () {
        Route::get('/order-details', 'index')->name('order.index');
        Route::get('/new-order', 'create')->name('order.create');
        Route::post('/new-order', 'store');
        Route::get('/edit-order/{id}/edit', 'edit')->name('order.edit');
        Route::patch('/edit-order/{id}/update', 'update')->name('order.update');
        Route::delete('/edit-order/{id}/delete', 'destroy')->name('order.delete');
    }
);

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
