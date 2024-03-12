@extends('layouts.layoutnew')

@section('content')
    @if (session('message'))
        <div class="toast show position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Alert</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <h1 class="p-3 btn-org">{{ $restaurant->name }}</h1>
    <div class="container">
        <h2 class="my-3">I tuoi piatti ({{ count($restaurant->dishes) }})</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Immagine</th>
                    <th scope="col">Piatto</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Disponibile</th>
                    <th scope="col" class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->dishes as $dish)
                    <tr>
                        <td>
                            @if ($dish->image)
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }} img"
                                    class="d-block ms-2" height="25px">
                            @else
                                <i class="fa-regular fa-image img_not_found ms-3">
                                    <span>/</span>
                                </i>
                            @endif
                        </td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td class="ps-5">
                            @if ($dish->availability)
                                <i class="fa-solid fa-square-check text-success"></i>
                            @else
                                <i class="fa-solid fa-square-xmark text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                {{-- <a href="{{ route('admin.dishes.show', $dish) }}"
                                    class="btn btn-primary btn-sm">Dettagli</a> --}}
                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary btn-sm mx-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                {{-- Button trigger modal  --}}
                                <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $dish->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                {{-- Button trigger modal  --}}
                                {{-- Modal  --}}
                                <div class="modal fade" id="exampleModal-{{ $dish->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare: {{ $dish->name }}?
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Chiudi</button>
                                                <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Elimina">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal  --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">
            <a href="{{ route('admin.dashboard', $restaurant->id) }}" class="btn btn-secondary">
                <i class="fa-solid fa-right-to-bracket fa-rotate-180"></i>
            </a>
            <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-org">Aggiungi piatto</a>

        </div>
    </div>
@endsection
