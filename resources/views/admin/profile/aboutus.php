{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ編集')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aboutus～私について</title>
    </head>
    <body>
        <h1>aboutus～私について</h1>
        投稿者を対外的に紹介するページ
    </body>


@endsection