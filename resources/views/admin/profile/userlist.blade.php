@extends('layouts.app')
{{-- admin.blade.phpの@yield('title')に'm-life動画投稿'を埋め込む --}}
@section('title', 'm-lifeマイページ')
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
 <div class="row">
  <h2>利用者一覧</h2>
 </div>
  <div class="row">
   <div class="col-md-4">
   </div>
   <div class="col-md-8">
    <form action="{{ action('Admin\ProfileController@userlist') }}" method="get">
    </form>
   </div>
  </div>
  
   <div class="row"> 
    <div class="admin-news col-md-12 mx-auto">
     <div class="row">
      <table class="table table-striped table-hover">
       <thead>
        <tr>
            <!--<th width="5%">ID</th>-->
            <th width="15%">名前</th>
            <th width="15%">担当パート</th>
            <th width="10%">ジャンル</th>
            <th width="30%">自己紹介</th>
            <th width="10%">いいね数</th>
            <th width="10%">コメント数</th>
            <th width="10%">投稿動画</th>

        </tr>
       </thead>
        <tbody>
            <!--本来単数形にすべき-->
            @foreach($userlist as $user)
                <tr>
                    <!--<th>{{ $user->id }}</th>-->
                    <td>{{ str_limit($user->name, 100) }}</td>
                    <td>{{ str_limit($user->part, 100) }}</td>
                    <td>{{ str_limit($user->genre, 100) }}</td>
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
                     <td>
                       {{ $like_count}}
                     </td>
                    <td>{{$user->getCommentsAmountNum() }}</td>
                    <td><a href="{{ action('Admin\MovieController@posted_personal', ['id' => $user->id]) }}">動画</a></td>
                </tr>
            @endforeach
        </tbody>
                        
</div>

    
 
@endsection