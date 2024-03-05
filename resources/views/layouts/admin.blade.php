<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Imposta l'icona in base alla presenza dell'immagine del ristorante associato all'utente loggato -->
    @if (Auth::check() && Auth::user()->restaurant && Auth::user()->restaurant->image)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . Auth::user()->restaurant->image) }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpeg') }}">
    @endif

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top bg-nav flex-md-nowrap p-2 shadow">

            <div class="row justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="text-dark title-dashboard fnt-std">Area di amministrazione</div>
                    <a class="link-home navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
                        <div class="text-dark">Home</div>
                    </a>
                    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

            </div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2">
                    <a class="nav-link text-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-nav navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                @if (isset($restaurant))
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.restaurants.show', Auth::user()->restaurant->id) }}">
                                        <!-- Visualizza l'immagine del ristorante associato all'utente loggato o il logo -->
                                        @if (Auth::check() && Auth::user()->restaurant && Auth::user()->restaurant->image)
                                            <img class="logo"
                                                src="{{ asset('storage/' . Auth::user()->restaurant->image) }}"
                                                alt="{{ Auth::user()->restaurant->name }}">
                                        @else
                                            <img class="logo" src="{{ asset('img/logo.jpeg') }}"
                                                alt="Logo predefinito">
                                        @endif
                                        {{ Auth::user()->restaurant->name ?? 'Nome del Ristorante' }}
                                    </a>
                                @endif
                            </li>
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
