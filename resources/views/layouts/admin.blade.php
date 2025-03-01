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
    <header class="navbar py-0 justify-content-between sticky-top">
      <div class="container-fluid">
        {{-- Logo --}}
        <a class="navbar-brand py-0 d-flex align-items-center text-white fw-bold" href="{{ route('admin.dashboard')}}">
          <span class="ps-1">Laravel CRM</span>
          <img src="/crm_logo_transparent.png" alt="logo">
        </a>
        {{-- Logo --}}

        {{-- Toggler --}}
        <button class="navbar-toggler d-inline d-md-none collapsed me-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="custom-toggler-icon p-1"><i class="fa-solid fa-user"></i></span>
        </button>
        {{-- Toggler --}}
  
        {{-- Links Useless --}}
        {{-- <div class="navbar-nav d-none d-md-block">
          {{-- Logout --}}
          {{-- <div class="nav-item text-nowrap ms-2">
            <a class="nav-link text-white fw-bold fs-5 pe-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a> --}}
            {{-- Logout Form --}}
            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form> --}}
            {{-- Logout Form --}}
          {{-- </div> --}}
          {{-- Logout --}}
        {{-- </div> --}} 
        {{-- Links Useless --}}
      </div>
    </header>
    {{-- Header --}}

    {{-- Main Container --}}
    <div class="container-fluid">
      <div class="row">
        {{-- Sidebar --}}
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
          <div class="position-sticky">
            {{-- Menu --}}
            <ul class="nav flex-column">
              {{-- Charts --}}
              <li class="nav-item my-1 p-1">
                <a class="nav-link ps-0 text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'ms-active' : '' }}" href="{{ route('admin.dashboard') }}">
                  <i class="fa-solid fa-chart-line fa-lg fa-fw"></i>
                  <span class="ps-1">
                    Dashboard
                  </span> 
                </a>
              </li>
              {{-- Charts --}}

              {{-- Index Aziende --}}
              <li class="nav-item my-1 p-1">
                <a class="nav-link ps-0 text-white {{ Route::currentRouteName() == 'admin.companies.index' ? 'ms-active' : '' }}" href="{{ route('admin.companies.index') }}">
                  <i class="fa-solid fa-house fa-lg fa-fw ps-1"></i> 
                  <span class="ps-1">
                    Aziende
                  </span>
                </a>
              </li>
              {{-- Index Aziende --}}

              {{-- Nuova Azienda --}}
              <li class="nav-item my-1 p-1">
                <a class="nav-link ps-0 text-white {{ Route::currentRouteName() == 'admin.companies.create' ? 'ms-active' : '' }}" href="{{ route('admin.companies.create') }}">
                  <i class="fa-solid fa-plus fa-lg fa-fw"></i> 
                  <span class="ps-1">
                    Nuova azienda
                  </span>
                </a>
              </li>
              {{-- Nuova Azienda --}}

              {{-- Nuovo Dipendente --}}
              <li class="nav-item my-1 p-1 border-bottom border-bottom-md-none">
                <a class="nav-link px-0 pb-3 text-white {{ Route::currentRouteName() == 'admin.employees.create' ? 'ms-active' : '' }}" href="{{ route('admin.employees.create') }}">
                  <i class="fa-solid fa-user-plus fa-lg fa-fw ps-1"></i> 
                  <span class="ps-1">
                    Nuovo dipendente
                  </span>
                </a>
              </li>
              {{-- Nuovo Dipendente --}}

              {{-- Logout --}}
              <li class="nav-item mt-1 p-1">
                <a class="nav-link px-0 text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa-solid fa-door-closed fa-lg fa-fw ps-1"></i> 
                  <span class="ps-1">
                    Logout
                  </span>
                </a>
                {{-- Logout Form --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                {{-- Logout Form --}}
              </li>
              {{-- Logout --}}
            </ul>
            {{-- Menu --}}
          </div>
        </nav>
        {{-- Sidebar --}}

        {{-- Content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('content')
        </main>
        {{-- Content --}}
      </div>
    </div>
    {{-- Main Container --}}
  </div>
</body>

</html>
