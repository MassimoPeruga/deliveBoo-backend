@extends('layouts.layoutnew')

@section('content')
    <h1 class="p-3 btn-org">Ordini</h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Info Ordine</h2>
                <h5>#</h5>
                {{ $order->id }}
            </div>
            <div class="col-6">
                <h5>Totale</h5>
                {{ $order->total_amount }} &euro;
            </div>
            <div class="col">
                <h2>Info Cliente</h2>
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
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td>{{ $dish->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
