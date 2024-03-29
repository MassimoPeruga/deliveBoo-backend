@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mx-0 fw-normal">Ordine Effettuato il:
                    <span class="fw-bold"> {{ date('d-m-Y H:i', strtotime($order->created_at)) }}</span>
                </h3>
            </div>
        </div>
        <div class="my-4">
            <h5>Info Cliente</h5>
            <div class="row">
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
        </div>

        <h5>Piatti ordinati</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="col-7">Nome piatto</th>
                    <th scope="col" class="col-2">Prezzo</th>
                    <th scope="col" class="col-2">Quantità</th>
                    <th scope="col" class="col-1">Totale</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish['dish']->name }}</td>
                        <td>{{ $dish['dish']->price }} &euro;</td>
                        <td>{{ $dish['quantity'] }}</td>
                        <td>{{ sprintf('%.2f', $dish['dish']->price * $dish['quantity']) }} &euro;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end pe-5">
            <h5 class="d-inline">Totale Ordine: </h5>
            <span class="pe-1">{{ $order->total_amount }} &euro;</span>
        </div>
    </div>
@endsection
