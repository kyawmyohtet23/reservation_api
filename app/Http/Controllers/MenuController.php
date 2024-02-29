<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menus = Menu::where('restaurant_id', $restaurant->id)->get();



        // return $menus;
        // $collection = collect($menus);
        // return $pluck = $collection->pluck('name');
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $adminId = auth()->guard('admin-web')->user()->id;

        $restaurant = Restaurant::where('admin_id', $adminId)->with('admin')->first();



        $image = $request->file('image');
        $image_name = uniqid() . ($image->getClientOriginalName());
        $image->move(public_path('/images'), $image_name);

        $description = strip_tags($request->description);

        Menu::create([
            'restaurant_id' => $restaurant->id,
            'name' => $request->name,
            'image' => $image_name,
            'price' => $request->price,
            'description' => $description,
        ]);

        return redirect()->back()->with('success', 'Menu Created!');
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
