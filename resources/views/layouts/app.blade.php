<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!--↓画面幅を小さくしたとき、たとえばスマートフォンで見たときなどに文字や画像の大きさを調整してくれるタグです。-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- secure_asset「js/app.js」は、publicディレクトリのパスを返す関数のことです。 要するに、「/js/app.js」というパスを生成します。-->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('top') }}">M-LIFE</a>
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
        <!-- 3/9追記　Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
        {{-- 以下を追記 --}}
        <!-- Authentication Links -->
        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
        @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">アカウント登録</a></li>
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
        <main class="py-4 container">
          
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
            
        </main>
        
    </div>
    
    <footer class="footer"><div class="container"><p class="text-center text-gray text-small">© 2022 M-life</p></div></footer>
  </body>
</html>
