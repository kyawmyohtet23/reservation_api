<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Share reservation count to all views
        // view()->composer('*', function ($view) {
        //     if (Auth::guard('admin-web')->check()) {
        //         $adminId = auth()->guard('admin-web')->user()->id;
        //         $reservationCount = Reservation::where('restaurant_id', Restaurant::where('admin_id', $adminId)->first()->id)
        //             ->count();
        //         $view->with('reservationCount', $reservationCount);
        //     }



        view()->composer('*', function ($view) {
            if (Auth::guard('admin-web')->check()) {
                $admin = auth()->guard('admin-web')->user();
                if ($admin->restaurant) {
                    $reservationCount = Reservation::where('restaurant_id', $admin->restaurant->id)->count();
                    $view->with('reservationCount', $reservationCount);
                }
            }
        });
    }
}
