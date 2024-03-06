<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request): RedirectResponse
    {
        $request->validated();


        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $restaurant = new Restaurant();
        $restaurant->name = $request->restaurant_name;
        $restaurant->address = $request->address;
        $restaurant->phone = $request->phone;
        $restaurant->image = $request->image;
        $restaurant->description = $request->description;
        $restaurant->vat = $request->vat;
        $restaurant->user_id = $user->id;

        if (isset($data['types'])) {
            $restaurant->types()->sync($data['types']);
        }

        $restaurant->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
