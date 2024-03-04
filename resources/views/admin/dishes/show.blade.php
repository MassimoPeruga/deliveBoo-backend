@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        @foreach ($restaurant->dishes as $dish)
        <!--card-->
            <div class="card">
                <div class="container pt-5 pb-4">
                    <div class="d-flex justify-content-between">
                        <!--img-->
                        <div class="dish-img-container">
                            <img src="{{$dish->image}}" alt="{{$dish->name}}">
                        </div>
                        <!--/img-->
                        <!--dettagli piatto-->
                        <div class="dish-deatails-container">
                            <h2 class="pb-3 ps-4">
                                {{ dish->name }}
                            </h2>
                            <p>
                                {{ $dish->description}}
                            </p>
                            <p>
                                <span class="bold">Price:</span>
                                {{ $cocktail['price'] }}€
                            </p>
                        </div>
                        <!--/dettagli piatto-->
                    </div>
                    <div class="pt-3 text-center">
                        <a role="button" href="{{route("restaurant.index")}}" class="btn btn-org"> Torna al ristorante</a>
                    </div>
                </div>
            </div> 
            <!--/card--> 
        @endforeach
    </div>
@endsection
