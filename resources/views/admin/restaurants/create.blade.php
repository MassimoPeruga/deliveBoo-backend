@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <h1>
            Crea il tuo ristorante
        </h1>
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" name="name">Nome*:</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required
                    value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label" name="address">Indirizzo*:</label>
                <input type="text" class="form-control" id="address" aria-describedby="emailHelp"name="address"
                    required value="{{ old('address') }}">
                @error('address')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label"name="phone">Numero di Telefono*:</label>
                <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone"
                    required value="{{ old('phone') }}">
                @error('phone')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vat" class="form-label" name="vat">P.IVA*:</label>
                <input type="number" class="form-control" id="vat" aria-describedby="emailHelp"name="vat" required
                    value="{{ old('vat') }}">
                @error('vat')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label" name="description">Descrizione:</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"name="image">Immagine</label>
                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                    value="{{ old('image') }}">
                @error('image')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary">Crea il tuo ristorante</button>
        </form>
    </div>
@endsection