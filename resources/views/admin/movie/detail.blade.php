{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life動画詳細ページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
  <h1>動画詳細ページ</h1>
      <center>
          
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="form-group row">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <!--<th>#</th>-->
                          <th>タイトル</th>
                          <th>音楽ジャンル</th>
                          <th>ミュージシャン</th>
                          <th>曲名</th>
                          <th>タグ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!--<th scope="row">1</th>-->
                          <td>{{ $post_form->title }}</td>
                          <td> {{ config('genre')[$post_form->genre] }}</td>
                          <td>{{ $post_form->musician }}</td>
                          <td>{{ $post_form->songtitle }}</td>
                          <td>

                                @foreach ($post_form->tags as $tag)
                                    <div class="mb-2">
                                        <span>
                                            <strong>
                                               #{{ $tag->name }}
                                            </strong>
                                        </span>
                                    </div>
                                @endforeach
                </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <label class="col-md-4" for="title">動画タイトル</label>
                        <div class="col-md-11">
                            <td> 
                                <video src="{{ $post_form->movie }}" controls></video>
                            </td>                           
                        </div>
             </div>
                    
                <div class="card">
                    <div class="card-body">
                       {{$post_form->postcomment}}
                    </div>
                </div>
                    
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                    <!--いいね-->
                                    <!--↓->の左隣の変数は$post_formはPostモデルのインスタンス化　post_formが->を持っている、という意味、つまりPostモデルのfunctionが由来-->
                                 @if($post_form->is_liked_by_auth_user())
                                　<a href="{{ route('movie.unlike', ['id' => $post_form->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $post_form->likes->count() }}</span></a>
                                 @else
                                  <a href="{{ route('movie.like', ['id' => $post_form->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $post_form->likes->count() }}</span></a>
                                 @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                    <!--お気に入り-->
                                 @if($post_form->is_favorited_by_auth_user())
                                　<a href="{{ route('movie.unfavorite', ['id' => $post_form->id]) }}" class="btn btn-secondary btn-sm">お気に入り</a>
                                 @else
                                  <a href="{{ route('movie.favorite', ['id' => $post_form->id]) }}" class="btn btn-success btn-sm">お気に入り</a>
                                 @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 mx-auto">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                    </div>
            </div>


            
            <div class="form-group row">
                <div class="col-md-10">
                    <input type="hidden" name="id" value="{{ $post_form->id }}">
                </div>
            </div>

            <!--//ここより参考サイトより抜粋「ビューを作成」<https://qiita.com/NULL_000000/items/7ab02428437481a47ee7#reference>//-->
    <div class="card-body line-height">
        <div id="comment-post-{{ $post_form->id }}">
            <!--ここは参考サイトの「articles.comment_list」にあたる部分を、下部の「comment_list.blade.php」を貼り付けている-->
            @foreach ($post_form->comments as $comment)
            <div class="mb-2">
                <span>
                    <strong>
                    {{ $comment->user->name }}
                    </strong>
                </span>
                
                <span>
                    {{ $comment->comment }}
                </span>
                
                <!--コメント削除機能-->
                <div>
                    @if (Auth::user()->id == $comment->user_id)
                        <a href="{{ action('CommentsController@destroy', ['comment_id' => $comment->id]) }}">削除</a>
                    @endif
                </div>  
            
            </div>
            @endforeach
            <!--下部の「comment_list.blade.php」を貼り付けはここまで-->
            <!--//ここより参考サイトより抜粋　の後半-->
        </div>
        
        <a class="light-color post-time no-text-decoration" href="/posts/{{ $post_form->id }}">{{ $post_form->created_at }}</a>
        <hr>
        
        <div class="row actions" id="comment-form-article-{{ $post_form->id }}">
        
            <form class="w-100" id="new_comment" action="posts/{{ $post_form->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                    <input value="{{ $post_form->id }}" type="hidden" name="post_id" />
                    <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                    <input class="form-control comment-input border-0" placeholder="感想やコメントを ..." autocomplete="off" type="text" name="comment" />
                
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="コメント登録">
                </div>
            </form>
        </div>
    </div>
            <!--//参考サイトより抜粋　の貼り付け　ここまで-->
</div>
@endsection