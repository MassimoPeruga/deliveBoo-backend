@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="btn-org px-3">
            <h1 class="px-0 py-2 m-0">
                Ordini ricevuti - ({{ count($orders) }})
            </h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col" class="col-2">Totale Pagato</th>
                    <th scope="col" class="col-2">Data</th>
                    <th scope="col" class="text-center col-2">Dettagli Ordine</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->name }} {{ $order->surname }}</td>
                        <td>{{ $order->total_amount }} &euro;</td>
                        <td>{{ date('d-m-Y H:i', strtotime($order->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-info"><i
                                    class="fa-solid fa-circle-info"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
