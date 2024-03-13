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

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top bg-nav flex-md-nowrap p-2 shadow">

            <div class="row justify-content-between">
                <div class="d-flex align-items-center">
                    <a class="link-home navbar-brand col-md-3 col-lg-2 me-0 px-3" href="http://localhost:5174/">
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
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-nav navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-black fs-5 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gauge-simple fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black fs-5  {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.edit', Auth::user()->restaurant->slug) }}">
                                    <i class="fa-solid fa-pen-to-square fa-lg fa-fw"></i> Modifica Ristorante
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black fs-5 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.show', Auth::user()->restaurant->slug) }}">
                                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Menù
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black fs-5 {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.orders.index') }}">
                                    <i class="fa-solid fa-receipt fa-lg fa-fw"></i></i> Ordini Ricevuti
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 containermain">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
