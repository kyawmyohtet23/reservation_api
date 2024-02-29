<?php

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Broadcasting\ChannelClass;
use App\Models\RestaurantCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// user auth
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/logout', [UserAuthController::class, 'logout']);


// Route::middleware('auth:sanctum')->post('/logout', [UserAuthController::class, 'logout']);

// Route::middleware('auth:sanctum')->group(function () {
// });

// Admin auth
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);




Route::prefix('admin')->middleware(['auth:sanctum', 'type.admin'])->group(function () {
    Route::get('/admin-data', function () {
        return auth()->guard('admin')->user()->name;
    });

    Route::post('/logout', [AdminAuthController::class, 'logout']);

    Route::post('/create', [SettingController::class, 'store']);
});



Route::middleware('auth:sanctum', 'type.user')->group(function () {
    // Route::get('/data', function () {
    //     return auth()->user()->name;
    // });
    Route::get('user', [UserAuthController::class, 'getUser']);

    Route::post('/restaurants/reserve', [ReservationController::class, 'reserve']);

    Route::post('/make-review', [ReviewController::class, 'makeReview']);
});












Route::get('/restaurant-categories', function () {

    try {
        $categories = RestaurantCategory::all();
        return response()->json($categories);
    } catch (Exception $e) {
        return response()->json([
            'message' => $e->getMessage(),
            'status' => 500
        ], 500);
    }
});


Route::get('/restaurants', [RestaurantController::class, 'all']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'detail']);
Route::get('/cities', [RestaurantController::class, 'city']);
Route::post('/restaurants/search', [RestaurantController::class, 'search']);
// Route::get('')
// Route::get('/restaruants/{slug}/reviews', [RestaurantController::class, 'reviews']);





// all data
// for restaurant categories