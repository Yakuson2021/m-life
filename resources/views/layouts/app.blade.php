<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!----3/2追加　navbar section1---->
<!--<nav class="navbar navbar-light" style="background-color: #e3f2fd;">-->
  <!-- Navbar content -->
<!--</nav>-->

    <!----3/2追加　navbar section1---->
    
    <!----3/2追加　navbar section2---->
<!--    <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--  <div class="navbar-light">-->
<!--    <a class="navbar-brand" href="#">Navbar</a>-->
<!--    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--      <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--      <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--        <li class="nav-item">-->
<!--          <a class="nav-link active" aria-current="page" href="#">Home</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a class="nav-link" href="#">Link</a>-->
<!--        </li>-->
<!--        <li class="nav-item dropdown">-->
<!--          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--            Dropdown-->
<!--          </a>-->
<!--          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--            <li><a class="dropdown-item" href="#">Action</a></li>-->
<!--            <li><a class="dropdown-item" href="#">Another action</a></li>-->
<!--            <li><hr class="dropdown-divider"></li>-->
<!--            <li><a class="dropdown-item" href="#">Something else here</a></li>-->
<!--          </ul>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--        </li>-->
<!--      </ul>-->
<!--      <form class="d-flex">-->
<!--        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--        <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--      </form>-->
<!--    </div>-->
<!--  </div>-->
<!--</nav>-->
    <!----3/2追加　navbar section2---->
    <div id="app">
        <nav class="navbar-light">
            <div class="navbar">
                <a class="navbar" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
