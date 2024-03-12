@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  bg-nav">Registrati</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="mb-4">Dati Utente</h4>

                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col form-label text-md-right fw-bold">
                                    {{ __('Nome*') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col form-label text-md-right fw-bold">
                                    {{ __('Cognome*') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname"
                                        value="{{ old('surname') }}" required>
                                    @error('surname')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col form-label text-md-right fw-bold">
                                    {{ __('Indirizzo E-mail*') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col form-label text-md-right fw-bold">
                                    {{ __('Password*') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control"
                                        name="password" required autocomplete="new-password" data-bs-toggle="popover"
                                        data-bs-trigger="focus" data-bs-title="Deve contenere:"
                                        data-bs-content="almeno 8 caratteri, almeno una lettera maiuscola, almeno una lettera minuscola, almeno un numero e almeno un carattere speciale">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <div class="requirementpassowrd text-end mt-2"id="password-requirements">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('password')
                                    <div class="text-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row">
                                <label for="password_confirm" class="col-md-4 col form-label text-md-right fw-bold">
                                    {{ __('Conferma Password*') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="password_confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div id="password_error">
                                    </div>
                                </div>
                            </div>

                            <!--ristoranti-->
                            <h4 class="mb-4">Dati Ristorante</h4>

                            <div class="mb-4 row">
                                <label for="restaurant_name" class="col-md-4 col form-label text-md-right fw-bold">
                                    Nome Ristorante*:
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="restaurant_name"
                                        aria-describedby="emailHelp" name="restaurant_name"
                                        value="{{ old('restaurant_name') }}" required>
                                    @error('restaurant_name')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col form-label text-md-right fw-bold" name="address">
                                    Indirizzo*:
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="address" required
                                        aria-describedby="emailHelp"name="address" required value="{{ old('address') }}">
                                    @error('address')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="phone" class="col-md-4 col form-label text-md-right fw-bold">
                                    Numero di Telefono*:
                                </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                                        name="phone" required value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat" class="col-md-4 col form-label text-md-right fw-bold"
                                    name="vat">
                                    P.IVA*:
                                </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="vat"
                                        aria-describedby="emailHelp"name="vat" required value="{{ old('vat') }}">
                                    @error('vat')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 px-2 row row-cols-6">
                                <span class="form-label col-12 px-1 fw-bold">Tipologie*:</span>
                                @foreach ($types as $type)
                                    <div class="col form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}"
                                            id="type-{{ $type->id }}" name="types[]"
                                            {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="type-{{ $type->id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('types')
                                    <div class="text-danger mt-3 col-12">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col form-label text-md-right fw-bold"
                                    name="description">
                                    Descrizione:
                                </label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="image" class="col-md-4 col form-label text-md-right fw-bold"
                                    name="image">
                                    Immagine
                                </label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" id="image"
                                        aria-describedby="emailHelp"name="image" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="field-must mt-4">
                                <p class="fst-italic fs-6">Sono contrassegnati con * i campi obbligatori</p>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4 text-end">
                                    <button type="submit" class="btn btn-org">
                                        Registrati
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
