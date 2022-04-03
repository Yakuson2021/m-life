@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', '登録ユーザー覧')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
<div class="container">
  <h1>登録ユーザー覧</h1>
   <div class="row justify-content-center">
    <div class="col-md-12 mx-auto">

      <div class="form-group row">
       <div class="col-md-5">
        <a href="{{ route('check') }}" role="button" class="btn btn-primary">マイページへ</a>
       </div>
      </div>
     <table class="table table-hover">
        <form action="{{ action('Admin\ProfileController@userlist') }}" method="get"></form>
      <thead>
       <tr>
        <!--<th width="5%">ID</th>-->
        <th width="15%">名前</th>
        <th width="10%">担当パート</th>
        <th width="13%">ジャンル</th>
        <th width="30%">自己紹介</th>
        <th width="8%">いいね数</th>
        <th width="12%">コメント数</th>
        <th width="12%">投稿動画</th>
       </tr>
      </thead>
      
          <tbody>
      <!--本来単数形にすべき-->
     @foreach($userlist as $user)
      <tr>
       <!--<th>{{ $user->id }}</th>-->
       <td>{{ str_limit($user->name, 50) }}</td>
       <td>{{ str_limit(config('part')[$user->part], 50) }}</td>
       <td>{{ str_limit(config('genre')[$user->genre], 50) }}</td>
       <td>{{ str_limit($user->introduction, 100) }}</td>
       
        @php
         $like_count = 0;
         $posts = $user->posts;
        @endphp
        
        @foreach($posts as $post)
         @php
          $like_count += $post->likes()->get()->count(); 
         @endphp
        @endforeach
        
        <td>{{ $like_count}}</td>
        <td>{{$user->getCommentsAmountNum() }}</td>
        <td><a href="{{ action('Admin\MovieController@posted_personal', ['id' => $user->id]) }}">動画</a></td>
      
      </tr>
     @endforeach
    </tbody>
      

        

     </table>
    
    <p></p>
        

 </div>
</div>
    
 
@endsection