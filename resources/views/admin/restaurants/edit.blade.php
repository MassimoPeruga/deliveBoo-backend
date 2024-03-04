@extends('layouts.layoutnew')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>
            modifica:
        </h1>

        <form action="{{ route('restaurant.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" name="name"
                        value="{{ $restaurant->name }}">name:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ $restaurant->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        name="address"value="{{ $restaurant->address }}">address:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp"name="address"value="{{ $restaurant->address }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"name="phone"
                        value="{{ $restaurant->phone }}">phone:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone"value="{{ $restaurant->phone }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        name="vat"value="{{ $restaurant->vat }}">vat:</label>
                    <input type="number" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp"name="vat"value="{{ $restaurant->vat }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        name="description"value="{{ $restaurant->description }}">description:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp"name="description"value="{{ $restaurant->description }}">
                </div>
                <button type="submit" class="btn btn-primary">modifica</button>
        </form>
    </div>
@endsection
