@extends('layouts.layoutnew')

@section('content')
    <div class="bg-nav d-flex align-items-center">
        <h2 class="py-3 px-3">{{ $restaurant->name }}</h2>
    </div>
    <div class="d-flex justify-content-center">
        <h2>Menù</h2>
    </div>
    <div class="container ciao">

        <ul class="list-unstyled carddish">
            @foreach ($restaurant->dishes as $dish)
                <li class="d-flex gap-5 my-3">
                    <div>
                        <div>nome piatto: {{ $dish->name }}</div>
                        <div>
                            prezzo: {{ $dish->price }} &euro;
                        </div>
                        <div>
                            descrizione: {{ $dish->description }}
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-org btn-sm">modifica piatto</a>
                    </div>
                </li>
            @endforeach
        </ul>
    <div class="container">
        <h1 class="mt-3">{{ $restaurant->name }}</h1>
        <h2 class="my-3">I tuoi piatti</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Piatto</th>
                    <th scope="col">Descrizione/Ingredienti</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col" class="text-end">Modifica/Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurant->dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->description }}</td>
                        <td>{{ $dish->price }} &euro;</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.dishes.edit', $dish) }}"
                                    class="btn btn-secondary btn-sm mx-2">Modifica</a>
                                {{-- Button trigger modal  --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $dish->id }}">
                                    Elimina
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
            <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-org btndish">Aggiungi piatto</a>
            <a href="{{ route('admin.dashboard', $restaurant->id) }}" class="btn btn-secondary">Indietro</a>
        </div>
    </div>
@endsection
