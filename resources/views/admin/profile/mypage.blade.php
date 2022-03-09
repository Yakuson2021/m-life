@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
     <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>m-lifeマイページ</h2>
       <div>
       </div>
       
       <div class="form-group row">
        <label class="col-md-2">名前</label>{{ $user_form->name }}
       </div>
       
       <div class="form-group row">
        <label class="col-md-2">メールアドレス</label>{{ $user_form->email }}
       </div>
       
       <div class="form-group row">
        <label class="col-md-2">担当パート</label>{{ $user_form->part }}
       </div>
       
       <div class="form-group row">
        <label class="col-md-2">ジャンル</label>{{ $user_form->genre }}
       </div>
       
        <div class="form-group row">
        <label class="col-md-2">自己紹介</label>{{ $user_form->introduction }}
        </div>
       
        <div class="form-group row">
         <a href="{{ action('Admin\ProfileController@edit') }}">マイページの編集はコチラ</a>
        </div>
        
        <div class="form-group row">
         <a href="{{ action('Admin\MovieController@list')}}">投稿した動画はコチラ</a>
        </div>
        
        <div class="form-group row">
         <a href="{{ action('Admin\ProfileController@favorite_list') }}">あなたがお気に入りした動画一覧はコチラ</a>
        </div>
        
        <div class="col-md-4">
         <a href="{{ action('Admin\MovieController@add') }}" role="button" class="btn btn-primary">新規投稿！</a>
        </div>

       <!--//もし「いいね」が空だった場合、{}}行目が実行されない→結果としてなにも表示しない-->
        <div class="form-group row">「いいね」数</a>
        <!--//（この人に対してという意味なので）User.php（モデルファイル）のpublic function 〇〇〇の部分が「likes」となっている-->
        <!--↓「$user_form」はどこから来ている？→このページへ渡すときのProfileControllerのアクションのから-->
         @if($user_form->likes != null)
          {{ $user_form->likes->count() }}
         @endif
        </div>
        
        <div class="form-group row">「コメント」数</a>
         {{ $amount_coment_counts }}
        </div>
        
        <div class="form-group row">「favoriteした」数</a>
         @if($user_form->favorite != null)
          {{ $user_form->favorite->count() }}
         @endif
        </div>
      </div>
     </div>
    </div>
    
 
@endsection