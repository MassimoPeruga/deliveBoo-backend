@extends('layouts.layoutnew')
@section('content')
    <div class="container">
        <h1>
            Crea il tuo piatto
        </h1>
        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="price" class="form-label" name="price">Prezzo:</label>
                <input type="text" class="form-control" id="price" aria-describedby="emailHelp"name="price"
                    value="{{ old('price') }}">
                @error('price')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="availability" class="form-label" name="availability">Disponibile:</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected value=null>Seleziona</option>
                    <option value="0" {{ old('availability') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('availability') == '1' ? 'selected' : '' }}>Si</option>
                </select>
                @error('availability')
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
            <button class="btn-org p-2 rounded" class="btn btn-org">Crea il tuo piatto</button>
            <div class="field-must mt-4">
                <p class="fst-italic fs-6">Sono contrassegnati con * i campi obbligatori</p>
            </div>
        </form>
    </div>
@endsection

