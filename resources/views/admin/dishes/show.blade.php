@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <!--card-->
        <div class="card mt-5">
            <div class="container py-4 px-4">
                <!--dettagli piatto-->
                <div class="d-flex justify-content-between">
                    <div class="dish-deatails-container">
                        <h2 class="mb-3">{{ $dish->name }}</h2>
                        <!--img-->
                        @if ($dish->image)
                            <div class="dish-img-container">
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}"
                                    class="card-img-top">
                            </div>
                        @endif
                        <!--/img-->
                        <div class="my-3">Prezzo: {{ $dish->price }}€</div>
                        <h4>Descrizione/Ingredienti</h4>
                        <p>{{ $dish->description }}</p>
                    </div>
                </div>
                <!--/dettagli piatto-->
                <div class="pt-3 text-center">
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-secondary btn mx-2">Modifica</a>
                    <a role="button" href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-org">
                        Torna al ristorante
                    </a>
                </div>
            </div>
        </div>
        <!--/card-->
    </div>
@endsection
