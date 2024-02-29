<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->first();
        if (!$restaurant) {
            return redirect()->back()->with('error', 'Create your restaurant first.');
        }

        $images = Image::where('restaurant_id', $restaurant->id)->get();

        // $images = Image::orderBy('id', 'desc')->get();

        // return $images;

        return view('gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->with('admin')->first();

        $images = $request->file('images');


        foreach ($images as $image) {
            $image_name = uniqid() . ($image->getClientOriginalName());
            $image->move(public_path('/images'), $image_name);

            Image::create([
                'restaurant_id' => $restaurant->id,
                'image' => $image_name
            ]);
        }



        return redirect()->back()->with('success', 'Images created...');
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
