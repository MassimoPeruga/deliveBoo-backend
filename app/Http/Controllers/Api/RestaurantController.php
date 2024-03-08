<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // public function index(Request $request)
    // {

    //     $typeId = $request->input('type');


    //     if (!$typeId) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'È necessario specificare un ID di tipo per filtrare i ristoranti.'
    //         ], 400);
    //     }


    //     $restaurants = Restaurant::whereHas('types', function ($query) use ($typeId) {
    //         $query->where('type_id', $typeId);
    //     })->get();

    //     return response()->json([
    //         'success' => true,
    //         'results' => $restaurants
    //     ]);
    // }

    public function index(Request $request)
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
