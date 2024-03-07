@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <!--card-->
        <div class="card mt-5">
            <div class="container p-0">
                <!--card header-->
                <div class="btn-org d-flex justify-content-between align-items-center p-3">
                    <div>
                        <h3 class="m-0">{{ $dish->name }}</h3>
                    </div>
                    <div>
                        <h3 class="m-0">Descrizione/Ingredienti</h3>
                    </div>
                </div>
                <!--card header-->
                <!--card body-->
                <div class="d-flex justify-content-between">
                    <!--sezione destra-->
                    <div class="dish-deatails-container pt-3 ps-3">
                        <!--img-->
                        @if ($dish->image)
                            <div class="dish-img-container">
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="card-img">
                            </div>
                        @endif
                        <!--/img-->
                    </div>
                    <!--/sezione destra-->

                    <!--sezione sinistra-->
                    <div class="pe-3 ps-5 pt-3 col-sx">
                        <!--descrizione-->
                        <p>{{ $dish->description }}</p>
                        <!--/descrizione-->
                        <div class="d-flex justify-content-between mb-3 mt-4">
                            <!--prezzo-->
                            <div class="me-4">
                                <span class="fw-bold">Prezzo:</span> {{ $dish->price }}€
                            </div>
                            <!--/prezzo-->
                            <!--disponibilità-->
                            <div class="ms-4">
                                <span class="fw-bold">Disponibilità:</span>
                                @if ($dish->availability)
                                    Si
                                @else
                                    No
                                @endif

                            </div>
                            <!--/disponibilità-->
                        </div>

                    </div>
                    <!--/sezione sinistra-->
                </div>
                <!--bottoni-->
                <div class="py-3 pe-3 text-end">
                    <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-secondary btn mx-2">Modifica</a>
                    <a role="button" href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-org">
                        Torna al ristorante
                    </a>
                </div>
                <!--bottoni-->
            </div>
            <!--/card-body-->
        </div>
        <!--/card-->
    </div>
@endsection
