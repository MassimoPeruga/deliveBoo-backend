@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <h1> {{ $restaurant->name }}</h1>
        <ul>
            @foreach ($restaurant->dishes as $dish)
                <li>{{ $dish->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
