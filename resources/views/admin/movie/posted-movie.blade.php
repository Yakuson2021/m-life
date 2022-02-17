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
        
                <form action="{{ action('Admin\MovieController@list') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2">けんさく</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
            </div>
            
         <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">記事名</th>
                                <th width="20%">曲名</th>
                                <th width="15%">動画</th>
                                <th width="10%">編集</th>
                                <th width="20%">タグ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <td>{{ \Str::limit($post->songtitle, 250) }}</td>
                                    <td> 
                                        <video src="{{ secure_asset('storage/movie/' . $post->movie) }}" controls></video>
                                    </td>
                                    {{-- secure_asset→Laravel上のpublicディレクトリの中のPathを指している --}}
                                    <td> 
                                    <div>
                                        <a href="{{ action('Admin\MovieController@edit', ['id' => $post->id]) }}">編集</a>
                                    </div>
                                    </td>
                                    <td> 

                                        @foreach ($post->tags as $tag)
                                            <div class="mb-2">
                                                <span>
                                                    <strong>
                                                        #{{ $tag->name }}
                                                    </strong>
                                                </span>
                                            </div>
                                        @endforeach
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
@endsection