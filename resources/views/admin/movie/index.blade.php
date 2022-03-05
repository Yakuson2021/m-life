{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')
@section('title', 'm-life動画一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>m-life動画一覧ページ覧</h2>
            ここに全員が投稿した動画が一覧できるページです
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\MovieController@add') }}" role="button" class="btn btn-primary">新規投稿！</a>
            </div>

            
            <div class="col-md-8">
                <!--↓このコードは何を意味しているか？-->
                <form action="{{ action('Admin\MovieController@index') }}" method="get">
                    
                    <div class="form-group row">
                        <label class="col-md-2">曲名を検索</label>
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
                                        <a href="{{ action('Admin\MovieController@detail', ['id' => $post->id]) }}">詳細</a>
                                    </div>
                                    </td>
                                    <td> 
                                    <!--何を設定すればいいのか?-->
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