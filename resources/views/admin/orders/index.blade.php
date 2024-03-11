@extends('layouts.layoutnew')

@section('content')
    <h1 class="p-3 btn-org">Ordini</h1>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">n. Ordine</th>
                    <th scope="col">Email Cliente</th>
                    <th scope="col">Totale Pagato</th>
                    <th scope="col">Dettagli Ordine</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->total_amount }} &euro;</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info">Dettagli Ordine</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
