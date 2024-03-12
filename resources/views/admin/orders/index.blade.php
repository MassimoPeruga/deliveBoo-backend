@extends('layouts.admin')

@section('content')
    <h1 class="p-3 btn-org">Ordini</h1>
    <div class="container">
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
                        <td>{{ date('Y-m-d H:i', strtotime($order->created_at)) }}</td>
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
