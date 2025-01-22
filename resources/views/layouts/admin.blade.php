<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

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
    {{-- Header --}}
    <header class="navbar justify-content-between shadow-sm sticky-top">
      <div class="container-xxl">
        {{-- Logo --}}
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.dashboard')}}">Laravel CRM</a>
        {{-- Logo --}}
  
        {{-- Toggler --}}
        <button class="navbar-toggler d-inline d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="custom-toggler-icon p-1"><i class="fa-solid fa-user"></i></span>
        </button>
        {{-- Toggler --}}
  
        {{-- Links --}}
        <div class="navbar-nav d-none d-md-block">
          {{-- Logout --}}
          <div class="nav-item text-nowrap ms-2">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            {{-- Logout Form --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            {{-- Logout Form --}}
          </div>
          {{-- Logout --}}
        </div>
        {{-- Links --}}

      </div>
    </header>

    <div class="container-fluid vh-100">
      <div class="row h-100">
        <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                  href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
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
