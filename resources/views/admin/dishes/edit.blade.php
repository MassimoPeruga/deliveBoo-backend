@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-2  btn-org">
            <h2>Modifica piatto: {{ $dish->name }}</h2>
        </div>
        <form class="bg-white p-3 " action="{{ route('admin.dishes.update', $dish) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-8">
                    <label for="name" class="form-label" name="name">Nome*:</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                        required value="{{ old('name', $dish->name) }}">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-check py-3">
                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" value="1" id="availability"
                                name="availability" {{ old('availability') ? 'checked' : '' }}>
                            <label class="form-check-label" for="availability">
                                Disponibile
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" id="availability"
                                name="availability" {{ $dish->availability ? 'checked' : '' }}>
                            <label class="form-check-label" for="availability">
                                Disponibile
                            </label>
                        @endif
                    </div>
                    @error('availability')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12 col-md-6">
                    <label for="price" class="form-label" name="price">Prezzo*:</label>
                    <input type="number" min="0" step="0.01" class="form-control" id="price"
                        aria-describedby="emailHelp" name="price" value="{{ old('price', $dish->price) }}" required>
                    @error('price')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="image" class="form-label"name="image">Immagine</label>
                    <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                        value="{{ old('image') }}">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label" name="description">Descrizione:</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-org">Salva</button>
            <div class="field-must mt-4">
                <p class="fst-italic fs-6">Sono contrassegnati con * i campi obbligatori</p>
            </div>
        </form>
    </div>
@endsection
