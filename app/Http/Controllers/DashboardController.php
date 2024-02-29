<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Restaurant;
use App\Models\CustomToken;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // $admin = Admin::doesntHave('restaurant')->get();
        // return $admin;
        // return $restaurant;

        return view('admin.index');
    }

    // reservation
    public function reservation()
    {
        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->first();

        if (!$restaurant) {
            return redirect()->back()->with('error', 'No Reservation Yet');
        }

        $reservations = Reservation::where('restaurant_id', $restaurant->id)->get();

        $reservationCount = Reservation::where('restaurant_id', $restaurant->id)->count();

        // view()->share('reservationCount', $reservationCount);

        return view('reservation.index', compact('reservations', 'reservationCount'));
    }


    // detail
    public function detail($id)
    {
        // Fetch the reservation details from the database using the provided ID
        $reservation = Reservation::findOrFail($id);

        // Return the reservation details as a JSON response
        return response()->json(['reservation' => $reservation]);
    }


    // change status
    public function status(Request $request)
    {
        // return $request->all();

        $status = Reservation::where('id', $request->id)->first();
        // return $request->status;
        // return $status->status;

        if ($status->status === $request->status) {
            return back()->with('error', 'Choose another option.');
        }
        // return $status;

        $status->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'status changed.');
    }
}
