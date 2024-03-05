@extends('layouts.layoutnew')

@section('content')
    <div class="bg-nav d-flex align-items-center">
        <h2 class="py-3 px-3">{{ $restaurant->name }}</h2>
    </div>
    <div class="d-flex justify-content-center">
            <h2>Menù</h2>      
        </div>
    <div class="container">

        <ul class="list-unstyled">
            @foreach ($restaurant->dishes as $dish)
                <li class="d-flex gap-5 my-3">
                    <div>
                        {{ $dish->name }}
                        {{ $dish->price }} &euro;
                    </div>
                    <div>
                        {{ $dish->description }}
                    </div>
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary btn-sm">modifica piatto</a>
                </li>
            @endforeach
        </ul>
        <div class="my-3">
            <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-org">Aggiungi piatto</a>
            <a href="{{ route('admin.dashboard', $restaurant->id) }}" class="btn btn-secondary">Indietro</a>
        </div>

    </div>
@endsection
