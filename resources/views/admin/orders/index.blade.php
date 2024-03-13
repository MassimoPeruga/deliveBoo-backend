@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="btn-org px-3">
            <h1 class="px-0 py-2 m-0">
                Ordini ricevuti - ({{count($orders)}})
            </h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">n. Ordine</th>
                    <th scope="col">Email Cliente</th>
                    <th scope="col">Totale Pagato</th>
                    <th scope="col">Data</th>
                    <th scope="col">Dettagli Ordine</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->total_amount }} &euro;</td>
                        <td>{{ date('d-m-Y H:i', strtotime($order->created_at)) }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary">Dettagli Ordine</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashboard', Auth::user()->restaurant->slug) }}" class="btn btn-secondary">
            <i class="fa-solid fa-right-to-bracket fa-rotate-180"></i>
        </a>
    </div>
@endsection
