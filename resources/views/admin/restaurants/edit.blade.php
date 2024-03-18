@extends('layouts.admin')

@section('content')
    <div class="container bg-white px-0">
        <div class="btn-org px-3">
            <h1 class="px-0 py-2 m-0">
                Modifica:
            </h1>
        </div>
        <form class="px-3 py-3" action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome*:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name" required value="{{ old('name', $restaurant['name']) }}">
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
            <div class="row">
                <div class="mb-3 col-12 col-md-4">
                    <label for="exampleInputEmail1" class="form-label">Numero di Telefono*:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" required value="{{ old('phone', $restaurant['phone']) }}">
                    @error('phone')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-12 col-md-4">
                    <label for="exampleInputEmail1" class="form-label">P.IVA*:</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="vat" required value="{{ old('vat', $restaurant['vat']) }}">
                    @error('vat')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-12 col-md-4">
                    <label for="image" class="form-label"name="image">Immagine</label>
                    <input type="file" class="form-control" id="image" aria-describedby="emailHelp"name="image"
                        value="{{ old('image', $restaurant['image']) }}">
                    @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 px-2 row">
                <label class="form-label col-12 px-1 fw-bold">Tipologie*:</label>
                @foreach ($types as $type)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="form-check form-check-inline">
                            @if ($errors->any())
                                <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]"
                                    id="type-{{ $type->id }}"
                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                            @else
                                <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]"
                                    id="type-{{ $type->id }}"
                                    {{ $restaurant->types->contains($type->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                            @endif
                        </div>
                    </div>
                @endforeach

                @error('types')
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
            <button type="submit" class="btn btn-org">Salva</button>
            <div class="field-must mt-4">
                <p class="fst-italic fs-6">Sono contrassegnati con * i campi obbligatori</p>
            </div>
        </form>
    </div>
@endsection
