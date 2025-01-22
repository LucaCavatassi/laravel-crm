<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm py-0">
            <div class="container">
                {{-- Brand + Home Link --}}
                <a class="navbar-brand d-flex align-items-center py-0" href="{{ url('/') }}">
                    <img src="/crm_logo_transparent.png" alt="logo">
                </a>

                {{-- Hamburger Toggler --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="navbar opener">
                    <span class="custom-toggler-icon p-1"><i class="fa-solid fa-user"></i></span>
                </button>

                {{-- Collapsed Navbar --}}
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ps-3 d-block d-md-none">
                                <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('login') }}">
                                    <span class="ps-2">
                                        Login 
                                        <span>&RightArrow;</span>
                                        <span>
                                            <i class="fa-solid fa-door-open"></i>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @else
                        <li class="nav-item ps-3 ps-md-0 d-block d-md-none">
                            <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('admin.dashboard') }}">
                                <span class="ps-2 ps-md-0">
                                    Dashboard 
                                    <span>&rightarrow;</span>
                                    <i class="fa-solid fa-chart-line"></i>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ps-3 ps-md-0 d-block d-md-none">
                            <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="ps-2 ps-md-0">
                                    Logout
                                    <span>&RightArrow;</span>
                                    <i class="fa-solid fa-door-closed"></i>
                                </span>
                            </a>
                            {{-- Logout Form --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>

                {{-- Opened Navbar --}}
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ps-3 ps-md-0">
                                <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('login') }}">
                                    <span class="ps-2 ps-md-0">
                                        Login 
                                    </span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item d-flex ps-3 ps-md-0">
                                <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('admin.dashboard') }}">
                                    <span class="ps-2 pe-2 ps-md-0">
                                        Dashboard 
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item d-flex ps-3 ps-md-0">
                                <a class="nav-link my-3 fs-5 fw-bold text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <span>
                                        Logout
                                    </span>
                                </a>
                                {{-- Logout Form --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
