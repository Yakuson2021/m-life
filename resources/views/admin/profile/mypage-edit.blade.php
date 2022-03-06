{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ編集')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
     <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>m-lifeマイページ編集画面</h2>
        
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
            　　<input type="text" class="form-control" name="part" value="{{ $user_form->part }}">
            　</div>
           </div>
          
           <div class="form-group row">
            　<label class="col-md-2">ジャンル</label>
            　<div class="col-md-10">
            　　<input type="text" class="form-control" name="genre" value="{{ $user_form->genre }}">
            　</div class="col-md-10">
           </div>
          
           <div class="form-group row">
            　<label class="col-md-2">自己紹介</label>
            　<div class="col-md-10">
            　　<input type="text" class="form-control" name="introduction" value="{{ $user_form->introduction }}">
           　　 </div>
           </div>

      　　　　 {{ csrf_field() }}
           <input type="submit" class="btn btn-primary" value="更新">
         </form>
       </div>
      </div>
     </div>
@endsection