@extends('layouts.app')
@section('title', 'm-lifeへようこそ')
@section('content')
<body>
 <div class="row justify-content-center">
  <div class="col-md-9 mx-auto">
<!--ここから貼り付け-->
   <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><b>こんにちは！</B></h1>
      <p class="lead">ようこそM-Lifeへ。ご自身のイチオシ演奏動画をUPして、コミュニティを広げていきましょう。<br>初めての方はまずは新規登録へ</p>
      <center><a class="btn btn-outline-primary btn-lg" href="{{ route('register') }}">新規登録</a>
      <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}">ログイン</a></center>
    </div>
    </div>
  <div class="container">
      
      
      <img class="custom" src="{{ asset('img/m-life_logo.png') }}" alt="">

  </div><!-- /.container -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<!--ここまで-->
   </div>
  </div>
 </div>
</body>
@endsection