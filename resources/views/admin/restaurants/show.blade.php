@extends('layouts.layoutnew')

@section('content')
    <div class="bg-nav d-flex align-items-center">
        <h2 class="py-3 px-3">{{ $restaurant->name }}</h2>
    </div>
    <div class="d-flex justify-content-center">
        <h2>Menù</h2>
    </div>
    <div class="container">

        <ul class="list-unstyled carddish">
            @foreach ($restaurant->dishes as $dish)
                <li class="d-flex gap-5 my-3">
                    <div>
                        <div>nome piatto: {{ $dish->name }}</div>
                        <div>
                            prezzo: {{ $dish->price }} &euro;
                        </div>
                        <div>

                            descrizione: {{ $dish->description }}
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-org btn-sm">modifica piatto</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="my-3">
            <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-org btndish">Aggiungi piatto</a>
            <a href="{{ route('admin.dashboard', $restaurant->id) }}" class="btn btn-secondary">Indietro</a>
        </div>

    </div>
@endsection
