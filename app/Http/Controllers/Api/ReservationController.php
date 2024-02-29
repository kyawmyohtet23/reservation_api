<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Events\ReservationCreated;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    //

    public function reserve(Request $request)
    {
        // return $request->all();

        // $restaurant_id = Restaurant::where('slug', $slug)->first();

        $reservation = Reservation::create([
            'restaurant_id' => $request->input('restaurant_id'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'total_person' => $request->input('person'),
            'request' => $request->input('request'),
            'occasion' => $request->input('occasion'),
            'reserve_date' => $request->input('date'),
            'reserve_time' => $request->input('time'),
        ]);


        // return $reservation;

        // Check if the reservation was successfully created
        if ($reservation) {

            // broadcast(new ReservationCreated($reservation))->toOthers();
            // Broadcast::channel('', ::class);

            // Return a success response with the created reservation data
            return response()->json([
                'success' => true,
                'message' => 'Reservation created successfully',
                'reservation' => $reservation,
            ], 201);
        } else {
            // Return an error response if the reservation creation failed
            return response()->json([
                'success' => false,
                'message' => 'Failed to create reservation',
            ], 500);
        }
    }
}
