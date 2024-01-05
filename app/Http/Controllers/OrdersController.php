<?php

namespace App\Http\Controllers;

use Spatie\Permission\Traits\HasRoles;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::id() == 1) {
            $order_list = Orders::all();
        } else {
            // If not admin, fetch only the user's orders
            $order_list = Auth::user()->orders;
        }

        return view('orders.index', compact('order_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        // Check if the user is admin (user ID is 1) or the owner of the order
        if (Auth::id() == 1 || Auth::id() === $orders->users_id) {
            // If admin or owner, proceed with deletion
            $orders->delete();
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
        } else {
            // If not authorized, show an error message or redirect
            return redirect()->route('orders.index')->with('error', 'You are not authorized to delete this order');
        }
    }
}
