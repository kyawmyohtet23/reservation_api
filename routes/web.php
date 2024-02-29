<?php

use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});



// admin panel
Route::prefix('admin')->group(function () {

    Route::get('/register', [AdminAuthController::class, 'index'])->name('register#page');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('register');
    Route::get('/login', [AdminAuthController::class, 'loginPage'])->name('login#page');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');


    Route::middleware(['admin_auth'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/setting', [SettingController::class, 'index'])->name('setting');

        Route::resource('/restaurant', SettingController::class);


        Route::resource('/menu', MenuController::class);

        Route::resource('/gallery', GalleryController::class);

        Route::get('/reservations', [DashboardController::class, 'reservation'])->name('reservation');

        Route::get('/reservations/detail/{id}', [DashboardController::class, 'detail'])->name('reservation.detail');

        Route::post('/reservations/change-status', [DashboardController::class, 'status'])->name('status');
    });
});
