{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-life動画投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
              <h2>m-life</h2>
        ここが投稿するページです
        
                <form action="{{ action('Admin\MovieController@add') }}" method="post" enctype="multipart/form-data">
 // 以下を追記
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">音楽ジャンル</label>
                        <div class="col-md-10">
                             <input type="text" class="form-control" name="genre" value="{{ old('genre') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">アーティスト</label>
                        <div class="col-md-10">
                             <input type="text" class="form-control" name="musician" value="{{ old('musician') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">曲名</label>
                        <div class="col-md-10">
                             <input type="text" class="form-control" name="songtitle" value="{{ old('songtitle') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">動画</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="movie">
                        </div>
                    </div>
                     <input type="hidden" class="form-control-file" name="user_id", value="{{ $user_id }}">
                    


                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
            </div>
        </div>
@endsection