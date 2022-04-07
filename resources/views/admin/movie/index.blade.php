{{-- layouts/app.blade.phpを読み込む --}}
@extends('layouts.app')
@section('title', '全員が投稿した動画一覧ページ')

@section('content')
    <div class="container">
        <h1>全員が投稿した動画一覧ページ</h1>
            <div class="row">
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
                                <!--<th width="10%">ID</th>-->
                                <th width="15%">記事名</th>
                                <th width="15%">曲名</th>
                                <th width="15%">動画</th>
                                <th width="10%">編集</th>
                                <th width="20%">タグ</th>
                                <th width="12%">いいね数</th>
                                <th width="13%">コメント数</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <!--ID-->
                                    <!--<th>{{ $post->id }}</th>-->
                                    <!--記事名-->
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <!--曲名-->
                                    <td>{{ \Str::limit($post->songtitle, 250) }}</td>
                                    <!--動画-->
                                    <td> 
                                        <video controls width="300">
                                            <source src="{{$post->movie }}" controls>
                                        </video>
                                        
                                        <!--<iframe src="{{$post->movie}}"></iframe>-->
                                        
                                    </td>
                                    </td>
                                    {{-- secure_asset→Laravel上のpublicディレクトリの中のPathを指している --}}
                                    <!--編集-->
                                    <td> 
                                    <div>
                                        <a href="{{ action('Admin\MovieController@detail', ['id' => $post->id]) }}">詳細</a>
                                    </div>
                                    </td>
                                    
                                    <td> 
                                    <!--//1件の投稿(つまり$post)に対するタグの中の1件のタグ-->
                                    <!--タグ-->
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
                                    
                                    <!--いいね     -->
                                    <td> 
                                    <!--//1件の投稿(つまり$post)に対するlikes（「likes」はPostモデルにあるfunctionのlikesを引っ張ってきている）-->
                                        @if(isset($post->likes))
                                            {{ $post->likes->count() }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    
                                    <!--コメント-->
                                    <td>
                                         <!--//1件の投稿(つまり$post)に対するcomments（「comments」はPostモデルにあるfunctionのcommentsを引っ張ってきている）-->
                                        @if(isset($post->comments))
                                    　　    {{$post->comments->count()}}
                                    　　@else
                                    　　    0
                                    　　@endif
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