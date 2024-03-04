<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestuarantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $restaurant = Restaurant::where();


        // return view("dashboard", compact("restaurant"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestuarantRequest $request)
    {
        $data = $request->validated();

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        if (isset($data['image'])) {
            $restaurant->image = Storage::put('uploads', $data['image']);
        }

        $restaurant->user_id = auth()->user()->id;
        $restaurant->save();

        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)
            ->with(['dishes' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->first();
        // dd(compact('restaurant'));

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        $restaurant->update($data);
        $restaurant->save();
        return redirect()->route('restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
