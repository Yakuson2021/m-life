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
    <div id="app">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">M-LIFE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-expanded="false">マイページ</a>
          <div class="dropdown-menu" aria-labelledby="dropdown">
            <a class="dropdown-item" href="{{ route('check') }}">登録情報画面</a>
            <a class="dropdown-item" href="{{ route('mypage-edit') }}">登録情報編集</a>
            <a class="dropdown-item" href="{{ route('list') }}">投稿記事一覧</a>
            <a class="dropdown-item" href="{{ route('favorite_list') }}">お気に入り一覧</a>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('movie.post') }}">新規投稿<span class="sr-only">(現位置)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">投稿記事一覧<span class="sr-only">(現位置)</span></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('userlist') }}">ユーザー一覧<span class="sr-only">(現位置)</span></a>
        </li>

      </ul>
      <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="search" placeholder="検索..." aria-label="検索...">
      </form>

        <!-- 3/9追記　Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
        {{-- 以下を追記 --}}
        <!-- Authentication Links -->
        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
        @else
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
<!-- 3/9追記　ここまで -->
    
  </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
