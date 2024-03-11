@extends('layouts.layoutnew')

@section('content')
    <h1 class="p-3 btn-org">Ordini</h1>
    <div class="container">
        <div class="row">
            <h2>Info Ordine</h2>
            <div class="col-6">
                <h5 class="d-inline">#</h5>
                {{ $order->id }}
            </div>
            <div class="col-6">
                <h5 class="d-inline">Totale</h5>
                {{ $order->total_amount }} &euro;
            </div>
            <h2 class="mt-3">Info Cliente</h2>
            <div class="col">
                <h5>Nome</h5>
                {{ $order->name }}
                {{ $order->surname }}
            </div>
            <div class="col">
                <h5>Numero di Telefono</h5>
                {{ $order->phone }}
            </div>
            <div class="col">
                <h5>Email</h5>
                {{ $order->email }}
            </div>
            <div class="col">
                <h5>Indirizzo</h5>
                {{ $order->delivery_address }}
            </div>
        </div>
        <h2 class="mt-3">Piatti ordinati</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome piatto</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Quantità</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish['dish']->name }}</td>
                        <td>{{ $dish['dish']->price }} &euro;</td>
                        <td>{{ $dish['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
