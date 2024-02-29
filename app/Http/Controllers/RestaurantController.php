<?php

namespace App\Http\Controllers;

use Error;
use App\Models\City;
use App\Models\Review;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //

    public function all()
    {
        $restaurants = Restaurant::orderBy('id', 'desc')->get();


        $restaurants = $restaurants->map(function ($restaurant) {
            $restaurant->description = strip_tags($restaurant->description);
            return $restaurant;
        });

        // return $restaurants;

        return response()->json($restaurants);
    }


    public function search(Request $request)
    {
        // return $request->all();
        $restaurants = Restaurant::orderBy('id', 'desc');

        $cityId = $request->cityId;
        $search = $request->search;

        if ($cityId) {
            $restaurants->where('city_id', $cityId);
        }
        if ($search) {
            $restaurants->where('name', 'LIKE', "%$search%");
        }

        $restaurants = $restaurants->get();

        return response()->json($restaurants);
    }



    public function detail($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('image', 'menu')->with(['review' => function ($query) {
            $query->with('user');
        }])->first();

        if (!$restaurant) {
            return response()->json([
                'error' => 'Internal Server Error'
            ], 500);
        }

        return response()->json($restaurant);
    }


    public function city()
    {
        $cities = City::all();

        return response()->json($cities);
    }






    // review

}
