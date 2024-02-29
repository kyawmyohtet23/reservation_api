<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RestaurantCategory;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->with('admin')->first();

        return view('setting');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->with('admin')->first();

        if (!$restaurant) {
            $categories = RestaurantCategory::all();
            $cities = City::all();

            return view('admin.create', compact('categories', 'cities'));
        } else {
            return redirect()->route('setting');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $image = $request->file('image');
        $image_name = uniqid() . ($image->getClientOriginalName());
        $image->move(public_path('/images'), $image_name);

        $description = strip_tags($request->description);
        $address = strip_tags($request->address);

        Restaurant::create([
            'admin_id' => auth()->guard('admin-web')->user()->id,
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'slug' => $request->name,
            'image' => $image_name,
            'name' => $request->name,
            'description' => $description,
            'phone' => $request->phone,
            'address' => $address,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Restaurant has been created...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
