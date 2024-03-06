@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  bg-nav">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right fw-bold">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="names" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <div id="namerequired" class="error">
                                        {{-- il campo nome non può essere vuoto --}}
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right fw-bold">{{ __('Cognome*') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                                    <div id="surnamerequired" class="error">
                                        {{-- il campo cognome non può essere vuoto --}}
                                    </div>
                                    @error('surname')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right fw-bold">{{ __('Indirizzo E-mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    <div id="emailrequired" class="error">
                                        {{-- il campo email non può essere vuoto --}}
                                    </div>
                                    <!--ciao!!-->
                                    @error('email')
                                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right fw-bold">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control"
                                        name="password" required autocomplete="new-password" data-bs-toggle="popover"
                                        data-bs-title="caratteri richiesti"
                                        data-bs-content="almeno 8 caratteri , almeno una lettera maiuscola ,almeno una lettera minuscola , almeno un numero e almeno un carattere speciale [&
                                                “” ,' ,  < ,  > , # ,!,]">
                                    <div class="d-flex justify-content-between">
                                        <div> <label for="show-password" class="mt-2">mostra password</label>
                                            <input type="checkbox" name="" id="show-password">
                                        </div>
                                        <div>
                                            <div class="requirementpassowrd text-end mt-2"id="password-requirements">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div id="password-requirements" class="requirementpassowrd">
                                        <div class="requirement" id="length">almeno 8 caratteri.</div>
                                        <div class="requirement" id="lowercase">deve contenere almeno una lettera minuscola.
                                        </div>
                                        <div class="requirement" id="uppercase">deve contenere almeno una lettere maiuscola.
                                        </div>
                                        <div class="requirement" id="number">deve contenere almeno un numero.</div>
                                        <div class="requirement" id="special-char">deve contenere almeno un carattere
                                            speciale.</div> --}}

                                </div>
                                {{-- <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"> --}}

                                @error('password')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right fw-bold">{{ __('Conferma Password*') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>
                    <!--ristoranti-->
                    <h4 class="mb-4">Dati Ristorante</h4>
                    <div class="mb-4 row">
                        <label for="name" class="col-md-4 col-form-label text-md-right fw-bold">Nome
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
                        <label for="address" class="col-md-4 col-form-label text-md-right fw-bold"
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
                        <label for="phone" class="col-md-4 col-form-label text-md-right fw-bold">Numero di
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
                        <label for="vat" class="col-md-4 col-form-label text-md-right fw-bold"
                            name="vat">P.IVA*:</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="vat"
                                aria-describedby="emailHelp"name="vat" required value="{{ old('vat') }}">
                            @error('vat')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 px-2 row row-cols-6">
                        <label class="form-label col-12 px-1 fw-bold">Tipologie*:</label>
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
                        @error('type')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 row">
                        <label for="description" class="col-md-4 col-form-label text-md-right fw-bold"
                            name="description">Descrizione:</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-4 row">
                        <label for="image" class="col-md-4 col-form-label text-md-right fw-bold"
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
                        <div class="col-md-6 offset-md-4 text-end">
                            <button type="submit" class="btn btn-org">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>

                    </form>
                </div>
                <div class="mb-4 row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right mx-1">{{ __('Conferma Password*') }}</label>

                    <div class="col-md-6">
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <div id="password_error">
                        </div>
                    </div>
                </div>
                <!--ristoranti-->
                <div class="container">
                    <h4 class="mb-4">Dati Ristorante</h4>
                    <div class="mb-4 row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome
                            Ristorante*:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                name="restaurant_name" required value="{{ old('restaurant_name') }}">
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
