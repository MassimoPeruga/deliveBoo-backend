@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <p class="p-3 mb-4 rounded">
                Ora che hai eseguito l' accesso puoi gestire il profilo del tuo ristorante al meglio aggiungendo i
                piatti che andranno ad arricchire il tuo menù visualizzato online
            </p>
            <!--card-->
            <div class="card mb-3 restaurant-card border-0 mt-5">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!--img-->
                        @if (Auth::user()->restaurant->image)
                            <img src="{{ asset('storage/' . Auth::user()->restaurant->image) }}"
                                alt="{{ Auth::user()->restaurant->name }}" class="img-fluid rounded-start">
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

        </div>

    </div>
@endsection
