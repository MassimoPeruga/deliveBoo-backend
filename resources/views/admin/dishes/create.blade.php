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
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                    name="name"value="{{ old('name') }}">
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
                <label for="availability" class="form-label" name="availability">Disponibilità:</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Seleziona</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                @error('image')
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
            <button class="btn btn-primary">Crea il tuo piatto</button>
        </form>
    </div>
@endsection
