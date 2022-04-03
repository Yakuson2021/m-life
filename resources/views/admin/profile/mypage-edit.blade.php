{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ編集')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
    <h1>マイページ編集画面</h1>
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">

        
        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
         
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
        　　<div class="form-group row">
           　<label class="col-md-2">名前</label>
           　<div class="col-md-10">
           　　<input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
           　</div>
          　</div>
          
           <div class="form-group row">
            　<label class="col-md-2">Mailアドレス</label>
            　<div class="col-md-10">
            　　<input type="text" class="form-control" name="email" value="{{ $user_form->email }}">
            　</div>
           </div>
          
           <div class="form-group row">
            　<label class="col-md-2">担当パート</label>
            　<div class="col-md-10">
            　　
                <select name="part">
                    @foreach(config('part') as $index => $name)
                    <option value="{{ $index }}" @if(old('part',$user_form->part) == $index) selected @endif>{{$name}}</option>
                    @endforeach
                </select>
            　　
            　</div>
           </div>
           
          
           <div class="form-group row">
            　<label class="col-md-2">ジャンル</label>
            　<div class="col-md-10">
                <select name="genre">
                    @foreach(config('genre') as $index => $name)
                    <option value="{{ $index }}" @if(old('genre',$user_form->genre) == $index) selected @endif>{{$name}}</option>
                    @endforeach
                </select>
            　</div>
           </div>
          
           <div class="form-group row">
            　<label class="col-md-2">自己紹介</label>
            　<div class="col-md-10">
            　　<textarea rows="4" class="form-control" name="introduction" value="{{ $user_form->introduction }}"></textarea>
           　　 </div>
           </div>

      　　　　 {{ csrf_field() }}
           <input type="submit" class="btn btn-primary" value="更新">
         </form>
       </div>
      </div>
     </div>
@endsection