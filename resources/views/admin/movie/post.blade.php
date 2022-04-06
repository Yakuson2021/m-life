{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life動画投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
    <h1>動画投稿</h1>
        <div class="row">
            <div class="col-md-10 mx-auto">
        
                <form action="{{ action('Admin\MovieController@add') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">音楽ジャンル</label>
                        <div class="col-md-7">
                            <select name="genre">
                                @foreach(config('genre') as $index => $name)
                                <option value="{{ $index }}" @if(old('_pref') == $index) selected @endif>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">ミュージシャン</label>
                        <div class="col-md-7">
                             <input type="text" class="form-control" name="musician" value="{{ old('musician') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">曲名</label>
                        <div class="col-md-7">
                             <input type="text" class="form-control" name="songtitle" value="{{ old('songtitle') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">動画ファイル</label>
                        <div class="col-md-7">
                            ※動画のファイルサイズ：上限7MBまで
                            <!--<input type="text" class="form-control" name="movie">-->
                            <input type="file" class="form-control-file" name="movie">
                        </div>
                    </div>
                     <input type="hidden" class="form-control-file" name="user_id", value="{{ $user_id }}">
                    
                    <div class="form-group row">
                        <label class="col-md-2">投稿コメント</label>
                        <div class="col-md-7">
                             <textarea rows="3"  class="form-control" name="postcomment" value="{{ old('postcomment') }}"></textarea>
                        </div>
                    </div>
                    <!--ここからタグ入れの参考サイトを拝借（意味を理解しないといけない）-->
                    <div class="form-group row">
                            <label class="col-md-2">タグ<br></label>
                        <div class="col-md-7">
                            <textarea rows="2"  id="tags" name="tags" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" value="{{ old('tags') }}" type="text"　autofocus placeholder="例：#練習用　#解説入り（頭に半角「#」を付ける　複数可）"></textarea>
                       
                        </div>
                    </div>
                    <!--ここまで参考サイト-->

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
            </div>
        </div>
@endsection