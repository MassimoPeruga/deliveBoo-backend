@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <!--card-->
        <div class="card">
            <div class="container pt-5 pb-4">
                <div class="d-flex justify-content-between">
                    <!--img-->
                    @if ($dish->image)
                        <div class="dish-img-container">
                            <img src="{{ $dish->image }}" alt="{{ $dish->name }}">
                        </div>
                    @endif
                    <!--/img-->
                    <!--dettagli piatto-->
                    <div class="dish-deatails-container">
                        <h2 class="pb-3 ps-4">
                            {{ $dish->name }}
                        </h2>
                        <p>
                            {{ $dish->description }}
                        </p>
                        <p>
                            <span class="bold">Price:</span>
                            {{ $dish['price'] }}€
                        </p>
                    </div>
                    <!--/dettagli piatto-->
                </div>
                <div class="pt-3 text-center">
                    <a role="button" href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-org">
                        Torna al ristorante
                    </a>
                </div>
            </div>
        </div>
        <!--/card-->
    </div>
@endsection
