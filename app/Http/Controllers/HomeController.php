<?php

namespace App\Http\Controllers;

use App\Models\Restaurants;
use App\Http\Controllers\Controller;
use App\Models\Meniulists;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $res_list = Restaurants::all();
        return view('index', compact('res_list'));
    }

    public function menius($id)
    {
        $meniu_list = Meniulists::findOrFail($id);
        $products = Products::where('meniulists_id', $id)->get();
        return view('menius', compact('meniu_list', 'products'));
    }
}
