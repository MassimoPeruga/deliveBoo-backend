@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-3">
            <h2>Modifica piatto: {{ $dish->name }}</h2>
        </div>
        <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label" name="name">Nome*:</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                    required value="{{ old('name', $dish->name) }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label" name="price">Prezzo:</label>
                <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="price"
                    value="{{ old('price', $dish->price) }}">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label" name="description">Descrizione:</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $dish->description) }}</textarea>

            </div>
            <div class="mb-3">
                <label for="image" class="form-label"name="image">Immagine</label>
                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                    value="{{ old('image') }}">
            </div>
            <button class="btn btn-primary">Modifica piatto</button>
        </form>
    </div>
@endsection
