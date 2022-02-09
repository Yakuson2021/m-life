{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life動画詳細ページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
              <h2>m-life動画詳細ページ</h2>
        ここにみんなが投稿した動画詳細のページとしますー　コメント　タグ付け　いいね　実装予定
        <form action="{{ action('Admin\MovieController@update') }}" method="post" enctype="multipart/form-data">
            
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                      <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            {{ $post_form->title }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="title">音楽ジャンル</label>
                        <div class="col-md-10">
                            {{ $post_form->genre }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="title">ミュージシャン</label>
                        <div class="col-md-10">
                            {{ $post_form->musician }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="title">曲名</label>
                        <div class="col-md-10">
                            {{ $post_form->songtitle }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="title">動画ファイル</label>
                        <div class="col-md-10">
                            <td> 
                            <video src="{{ secure_asset('storage/movie/' . $post_form->movie) }}" controls></video>
                            </td>                           
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $post_form->id }}">
                        </div>
                    </div>
                    
                    <div>
                    <a href="{{ route('movie.like', ['id' => $post_form->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post_form->likes->count() }}</span></a>
                    <a href="{{ route('movie.unlike', ['id' => $post_form->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post_form->likes->count() }}</span></a>
                    </div>
                    
                </form>
            </div>
@endsection