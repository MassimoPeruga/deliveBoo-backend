@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  bg-nav">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <!--ristoranti-->
                            <h4 class="mb-4">Dati Ristorante</h4>
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome
                                    Ristorante*:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}">
                                    @error('restaurant_name')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right"
                                    name="address">Indirizzo*:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="address"
                                        aria-describedby="emailHelp"name="address" required value="{{ old('address') }}">
                                    @error('address')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Numero di
                                    Telefono*:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                                        name="phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 row">
                                <label for="vat" class="col-md-4 col-form-label text-md-right"
                                    name="vat">P.IVA*:</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="vat"
                                        aria-describedby="emailHelp"name="vat" required value="{{ old('vat') }}">
                                    @error('vat')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col-form-label text-md-right"
                                    name="description">Descrizione:</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col-form-label text-md-right"
                                    name="image">Immagine</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" id="image"
                                        aria-describedby="emailHelp"name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field-must mt-4">
                                <p class="fst-italic fs-6">Sono contrassegnati con * i campi obbligatori</p>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-org">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
