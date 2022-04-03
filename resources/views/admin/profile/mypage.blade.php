@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
<div class="container">
  <h1>マイページ</h1>
   <div class="row justify-content-center">
    <div class="col-md-8 mx-auto">
     <table class="table table-hover">

  <h2>プロフィールデータ</h2>
      <div class="form-group row">
       <div class="col-md-6">
        <a href="{{ action('Admin\ProfileController@edit') }}" role="button" class="btn btn-primary">プロフィールデータの編集はコチラ</a>
       </div>
      </div>
       
       <div class="card">
       
        <div class="form-group row">
         <label class="col-md-5">名前</label><b>{{ $user_form->name }}</b>
        </div>
        
        <div class="form-group row">
         <label class="col-md-5">メールアドレス</label><b>{{ $user_form->email }}</b>
        </div>
        
        <div class="form-group row">
         <label class="col-md-5">担当パート</label><b>{{ config('part')[$user_form->part] }}</b>
        </div>
        
        <div class="form-group row">
         <label class="col-md-5">ジャンル</label><b>{{ config('genre')[$user_form->genre] }}</b>
        </div>
        
         <div class="form-group row">
          <label class="col-md-5">自己紹介</label><b>{{ $user_form->introduction }}</b>
         </div>
        </div>

         <div class="form-group row">
        <thead>
          <tr>
            <th>「いいね」された数</th>
            <th>「コメント」された数</th>
            <th>「お気に入り」した数</th>
          </tr>
        </thead>
         </div>
        
        <tbody>
          <tr>
        <!--（「この人に対して」という意味なので）User.php（モデルファイル）のpublic function 〇〇〇の部分が「likes」となっている-->
            <td> {{ $posts_likes_count }} </td>
            <td> {{ $amount_coment_counts }} </td>
        <!--もし「いいね」が空だった場合、2行目が実行されない→結果としてなにも表示しない という意-->
        <!--↓「$user_form」はどこから来ている？→このページへ渡すときのProfileControllerのアクション-->
            <td> @if($user_form->favorites != null)
                 {{ $user_form->favorites->count() }}
                 @endif
            </td>
          </tr>
        </tbody>
    </table>
    
    <p></p>
        
        <div class="form-group row">
         
         <label class="col-md-10"><ul><li><a href="{{ action('Admin\MovieController@list')}}">投稿した動画はコチラ(「いいね数」「コメント数」の内訳が確認できます)</a></li>
         <li><a href="{{ action('Admin\ProfileController@favorite_list') }}">あなたがお気に入りした動画一覧はコチラ</a></ul></li></label>
         
        </div>
 </div>
</div>
    
 
@endsection