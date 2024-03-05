@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        <h1>
            Modifica:
        </h1>

        <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome*:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                    required value="{{ old('name', $restaurant['name']) }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Indirizzo*:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" required value="{{ old('address', $restaurant['address']) }}">
                @error('address')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numero di Telefono*:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="phone" required value="{{ old('phone', $restaurant['phone']) }}">
                @error('phone')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">P.IVA*:</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="vat" required value="{{ old('vat', $restaurant['vat']) }}">
                @error('vat')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descrizione:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="description" value="{{ old('description', $restaurant['description']) }}">
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"name="image">Immagine</label>
                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                    value="{{ old('image', $restaurant['image']) }}">
                @error('image')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection
