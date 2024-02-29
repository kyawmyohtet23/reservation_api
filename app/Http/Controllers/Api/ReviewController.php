<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Review;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //

    public function makeReview(Request $request)
    {
        // return $request->all();
        $userId = Auth::user()->id;

        $restaurant = Restaurant::where('id', $request->restaurantId)->first();

        if (!$restaurant) {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error'
            ]);
        }

        $createdReview = Review::create([
            'user_id' => $userId,
            'restaurant_id' => $request->restaurantId,
            'review' => $request->comment,
            'rating' => $request->starCount
        ]);

        $createdReview = Review::where('id', $createdReview->id)->with('user')->first();

        // return $createdReview;

        // return response()->json([
        //     'status' => 201,
        //     'message' => 'success',
        //     'data' => $createdReview,
        // ]);

        return response()->json($createdReview);
    }



    // public function validation($request)
    // {
    //     return Validator::make($request->all(), [
    //         ''
    //     ]);
    // }
}
