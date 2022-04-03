{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life動画編集画面')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
    <h1>動画編集ページ</h1>
        <div class="row">
            <div class="col-md-10 mx-auto">
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
                            <input type="text" class="form-control" name="title" value="{{ $post_form->title }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="genre">音楽ジャンル</label>
                        <div class="col-md-10">
                            <select name="genre">
                                @foreach(config('genre') as $index => $name)
                                    <option value="{{ $index }}" @if(old('genre',$post_form->genre) == $index) selected @endif>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="musician">ミュージシャン</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="musician" value="{{ $post_form->musician }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="songtitle">曲名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="songtitle" value="{{ $post_form->songtitle }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">投稿コメント</label>
                        <div class="col-md-10">
                             <input type="text" rows="3" class="form-control" name="postcomment" value="{{ $post_form->postcomment }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-2" for="title">動画</label>
                        <div class="col-md-5">
                            <td> 
                            <video src="{{ secure_asset('storage/movie/' . $post_form->movie) }}" controls></video>
                                <div class="form-text text-info">{{ $post_form->movie }}　
                                    <input type="file" class="form-control-file" name="movie">
                                </div>
                            </td>
                        </div>
                    </div>

                    <!--<div class="form-check">-->
                    <!--　<label class="form-check-label">-->
                    <!--    <input type="checkbox" class="form-check-input" name="remove" value="true">削除-->
                    <!--　</label>-->
                    <!--</div>-->

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $post_form->id }}">
                                {{ csrf_field() }}     
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection