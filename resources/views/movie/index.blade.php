@extends('layouts.app')
@section('title', 'm-lifeへようこそ')
@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-8 mx-auto">

<h1>m-lifeへようこそ</h1>
 <div>
  <p><li><a href="{{ route('register') }}">会員登録</a></li></p>
  <p><li><a href="{{ route('login') }}">ログイン</a></li></p>
  <p><li><a href="{{ route('check') }}">マイページへ</a></li></p>
  <p><li><a href="{{ route('list') }}">自分がUPした動画一覧へ</a></li></p>
    <br>
 </div>

 <div>
  <p><li><a href="{{ route('index') }}">みんなの投稿動画一覧へ</a></li></p>
  <p><li><a href="{{ route('userlist') }}">みんなのプロフィール一覧へ</a></li></p>
 </div>

  </div>
 </div>
</div>
@endsection