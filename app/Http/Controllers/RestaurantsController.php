<?php

namespace App\Http\Controllers;

use App\Models\Restaurants;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'working_time' => 'required',
            'closing_time' => 'required',
            'description' => 'required',
        ]);

        // Create a new restaurant
        Restaurants::create($request->all());

        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurants $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurants $restaurant)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'working_time' => 'required',
            'closing_time' => 'required',
            'description' => 'required',
        ]);

        // Update the restaurant
        $restaurant->update($request->all());

        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurants $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully');
    }
}
