@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <h1> {{ $restaurant->name }}</h1>
        <ul>
            @foreach ($restaurant->dishes as $dish)
                <li class="d-flex gap-5">
                    <div>
                        {{ $dish->name }}
                        {{ $dish->price }}
                    </div>
                    <div>
                        {{ $dish->description }}
                    </div>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary btn-sm">modifica piatto</a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-primary">Aggiungi piatto</a>
    </div>
@endsection
