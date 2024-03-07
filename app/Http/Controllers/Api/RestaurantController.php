<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(string $id)
    {
        $restaurant = Restaurant::where('id', $id)->with('dishes')->first();
        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}
