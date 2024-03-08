<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::all()
            ->map(function ($restaurant) {
                if ($restaurant->image) {
                    $restaurant->image = "http://127.0.0.1:8000/storage/" . $restaurant->image;
                    return $restaurant;
                }
            });
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
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

    // public function show(string $id)
    // {
    //     $restaurant = Restaurant::where('id', $id)->with('dishes')->first()->map(function ($restaurant) {
    //         $restaurant->image = "http://127.0.0.1:8000/storage/".$restaurant->image;
    //         return $restaurant;
    //     });;
    //     return response()->json([
    //         'success' => true,
    //         'results' => $restaurant
    //     ]);
    // }
    public function show(string $id)
    {
        $restaurant = Restaurant::where('id', $id)->with('dishes')->first();

        if ($restaurant) {
            $restaurant->image = "http://127.0.0.1:8000/storage/" . $restaurant->image;
            $restaurant->dishes = $restaurant->dishes->map(function ($dish) {
                if ($dish->image) {
                    $dish->image = "http://127.0.0.1:8000/storage/" . $dish->image;
                    return $dish;
                }
            });
        }

        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}
