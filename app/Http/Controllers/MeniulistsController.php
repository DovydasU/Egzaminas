<?php

// app/Http/Controllers/MeniulistsController.php

namespace App\Http\Controllers;

use App\Models\Meniulists;
use App\Models\Restaurants;
use Illuminate\Http\Request;

class MeniulistsController extends Controller
{
    public function index()
    {
        $meniu = Meniulists::all();
        return view('meniu.index', compact('meniu'));
    }

    public function create()
    {
        return view('meniu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurants_id' => 'required',
            'name' => 'required',
        ]);

        Meniulists::create($request->all());
        return redirect()->route('meniu.index')->with('success', 'Meniu created successfully');
    }

    public function edit(Meniulists $meniulists)
    {
        return view('meniu.edit', compact('meniulists'));
    }

    public function update(Request $request, Meniulists $meniulists)
    {
        $request->validate([
            'restaurants_id' => 'required',
            'name' => 'required',
        ]);

        $meniulists->update($request->all());
        return redirect()->route('meniu.index')->with('success', 'Meniu updated successfully');
    }

    public function destroy(Meniulists $meniulists)
    {
        $meniulists->delete();
        return redirect()->route('meniu.index')->with('success', 'Meniu deleted successfully');
    }
}
