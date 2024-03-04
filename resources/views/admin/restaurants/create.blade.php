@extends('layouts.layoutnew')

@section('content')
    @include('partials.errors')
    <div class="container">
        <h1>
            Crea il tuo ristorante
        </h1>
        <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" name="name">Nome:</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                    name="name"value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label" name="address">Indirizzo:</label>
                <input type="text" class="form-control" id="address" aria-describedby="emailHelp"name="address"
                    value="{{ old('address') }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label"name="phone">Numero telefono:</label>
                <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                    name="phone"value="{{ old('phone') }}">
            </div>
            <div class="mb-3">
                <label for="vat" class="form-label" name="vat">P.IVA:</label>
                <input type="number" class="form-control" id="vat" aria-describedby="emailHelp"name="vat"
                    value="{{ old('vat') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label" name="description">Descrizione:</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"name="image">Immagine</label>
                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                    value="{{ old('image') }}">
            </div>
            <button>Crea il tuo ristorante</button>
        </form>
    </div>
    </div>
@endsection
