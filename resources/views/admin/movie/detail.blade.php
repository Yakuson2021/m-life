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
                    
                    <!--コメント削除機能-->
                    <div>
                        <a href="{{ action('Admin\CommentsController@destroy', ['id' => $comment->id]) }}">削除</a>
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
                            <span>{{ $comment->comment }}</span>
                       
                      </div>
                    @endforeach
                    　　　<!--下部の「comment_list.blade.php」を貼り付けはここまで-->
                    
                    <!--//ここより参考サイトより抜粋　の後半-->
                        </div>
                        <a class="light-color post-time no-text-decoration" href="/posts/{{ $post_form->id }}">{{ $post_form->created_at }}</a>
                        <hr>
                        <div class="row actions" id="comment-form-article-{{ $post_form->id }}">
                            
                            <form class="w-100" id="new_comment" action="/admin/posts/{{ $post_form->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                                {{csrf_field()}}

                                <input value="{{ $post_form->id }}" type="hidden" name="post_id" />
                                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
                            
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary" value="コメント登録">
                                </div>
                            </form>
                            


                        </div>
                        
                    </div>
                    <!--//参考サイトより抜粋　の貼り付け　ここまで-->
                    

                    
            </div>
@endsection