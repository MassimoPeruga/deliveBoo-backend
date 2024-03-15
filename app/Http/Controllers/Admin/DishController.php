<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //     $restaurant_id = Auth::user()->restaurant->id;
        //     $dishes = Dish::where('restaurant_id', $restaurant_id)->get();
        //     dd($dishes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)
            ->with(['dishes' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->first();

        $data = $request->validated();
        
        $new_dish = new Dish();
        $new_dish->fill($data);
        $new_dish->slug = Str::of($data['name'])->slug('-');
        
        if (isset($data['image'])) {
            $new_dish->image = Storage::put('uploads', $data['image']);
        }

        $new_dish->restaurant_id = $restaurant->id;
        $new_dish->save();

        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Nuovo piatto  \"$new_dish->name\" creato con successo!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)
            ->with(['dishes' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->first();

        return view('admin.dishes.show', compact('dish', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish, Restaurant $restaurant)
    {
        $data = $request->validated();

        $dish->slug = Str::of($data['name'])->slug('-');

        if (isset($data['image'])) {

            if ($dish->image) {
                Storage::delete($dish->image);
            }

            $data['image'] = $request->file('image')->store('uploads', 'public');
        }
        $dish->availability = $request->input('availability');
        $dish->update($data);

        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)
            ->with(['dishes' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->first();

        return redirect()->route('admin.restaurants.show', compact('dish', 'restaurant'))->with('message', "Piatto: \"$dish->name\" modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->image) {
            Storage::delete($dish->image);
        }
        $dish->delete();
        $userId = auth()->id();
        $restaurant = Restaurant::where('user_id', $userId)
            ->with(['dishes' => function ($query) {
                $query->whereNull('deleted_at');
            }])
            ->first();
        return redirect()->route('admin.restaurants.show', compact('restaurant'))->with('message', "Piatto: \"$dish->name\"cancellato con successo!");
    }
}
