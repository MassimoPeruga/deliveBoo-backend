<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $client = $request->input('userData');
        $cart_dishes = $request->input('cart');
        $new_order = new Order();
        $new_order->name = $client['name'];
        $new_order->surname = $client['surname'];
        $new_order->phone = $client['phone'];
        $new_order->email = $client['email'];
        $new_order->delivery_address = $client['address'];
        $new_order->total_amount = $request->input('total');
        $new_order->save();

        if (isset($cart_dishes)) {
            $pivot_data = [];
            foreach ($cart_dishes as $dish_data) {
                $pivot_data[$dish_data['id']] = [
                    'quantity' => $dish_data['quantity'],
                ];
            }
            $new_order->dishes()->sync($pivot_data);
        }
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
