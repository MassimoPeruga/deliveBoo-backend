@extends('layouts.admin')

@section('content')
    <div class=" container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <p class="p-3 mb-4 text-white rounded">
                    Ora che hai eseguito l' accesso puoi gestire il il profilo del tuo ristorante al meglio aggiungendo i
                    piatti che andranno ad arricchire il tuo menù visualizzato online
                </p>
                <!--card-->
                <div class="card mb-3 restaurant-card text-white border-0 mt-5">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <!--img-->
                            @if (Auth::user()->restaurant->image)
                                    <img src="{{ asset('storage/' . Auth::user()->restaurant->image) }}" alt="{{ Auth::user()->restaurant->name }}" class="img-fluid rounded-start">
                            @endif
                            <!--/img-->
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body">
                                <h5 class="card-title fs-3">{{ Auth::user()->restaurant->name }}</h5>
                                <p class="card-text">{{ Auth::user()->restaurant->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="card mb-4">
                    <div class="card-header bg-nav">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Login effettuato con successo!') }}
                    </div>
                </div> --}}
                <!--/card-->

                @if (Auth::check() && Auth::user()->restaurant)
                    <!-- Modifica ristorante -->
                    <div class="d-flex justify-content-between my-5">
                        <button class="btn-org rounded p-2">
                            <a class="text-dark"
                                href="{{ route('admin.restaurants.edit', Auth::user()->restaurant->id) }}">Modifica
                                ristorante</a>
                        </button>
                        <button class="btn-org rounded p-2">
                            <a class="text-dark"
                                href="{{ route('admin.restaurants.show', Auth::user()->restaurant->id) }}">Dettagli e
                                menù</a>
                        </button>
                    </div>
                @else
                    <!-- Aggiungi ristorante -->
                    <button class="btn-org rounded p-2">
                        <a class="text-dark" href="{{ route('admin.restaurants.create') }}">Aggiungi ristorante</a>
                    </button>
                @endif


            </div>

        </div>
        {{-- <form action="{{ route('dish.store') }}">
            <button class="btn btn-primary btnanimation">Crea un nuovo piatto</button>
        </form> --}}
    </div>
@endsection
