{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life投稿動画一覧')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
              <h2>投稿した動画</h2>
        ここが自分が投稿した動画一覧ページです
        
                <form action="{{ action('Admin\MovieController@add') }}" method="post" enctype="multipart/form-data">
 
                </form>
            </div>
            </div>
        </div>
@endsection