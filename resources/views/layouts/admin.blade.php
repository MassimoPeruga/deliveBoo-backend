<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpeg') }}">


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

<body class="overflow-hidden">
    <div id="app">

        <header class="navbar navbar-dark sticky-top bg-nav flex-md-nowrap p-2 shadow">

            <div class="row justify-content-between ms-1">
                <div class="d-flex align-items-center">
                    {{-- <a class="link-home navbar-brand col-md-3 col-lg-2 me-0 px-3" href="http://localhost:5174/">
                        <div class="text-dark">Home</div>
                    </a> --}}
                    <div class="logo-container">
                        <img src="{{ asset('img/logo.jpeg') }}" alt="logo" class="logo">
                    </div>
                    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

            </div>
            <div class="navbar-nav mx-2">
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
                <nav id="sidebarMenu"
                    class="col-2 col-md-2 col-lg-3 col-xl-2 d-block bg-nav navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column gy-2">
                            <li class="nav-item w-100">
                                <a class="nav-link text-black p-1 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gauge-simple fa-lg fa-fw"></i>
                                    <span class="d-none d-lg-inline">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100">
                                <a class="nav-link text-black p-1 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.edit', Auth::user()->restaurant->slug) }}">
                                    <i class="fa-solid fa-pen-to-square fa-lg fa-fw"></i>
                                    <span class="d-none d-lg-inline">
                                        Modifica Ristorante
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100">
                                <a class="nav-link text-black p-1 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.show', Auth::user()->restaurant->slug) }}">
                                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                                    <span class="d-none d-lg-inline">
                                        Menù
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item w-100">
                                <a class="nav-link text-black p-1 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.orders.index') }}">
                                    <i class="fa-solid fa-receipt fa-lg fa-fw"></i></i>
                                    <span class="d-none d-lg-inline">
                                        Ordini Ricevuti
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-10 col-md-10 col-lg-9 col-xl-10 ms-sm-auto p-4 overflow-y-auto containermain"
                    style="height: calc(100vh - 40px);">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
