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
            <th width="5%">ID</th>
            <th width="15%">名前</th>
            <th width="15%">担当パート</th>
            <th width="10%">ジャンル</th>
            <th width="30%">自己紹介</th>
            <th width="5%">いいね</th>
            <th width="10%">コメント数</th>
            <th width="5%">投稿動画</th>

        </tr>
       </thead>
        <tbody>
            @foreach($userlist as $users)
                <tr>
                    <th>{{ $users->id }}</th>
                    <td>{{ str_limit($users->name, 100) }}</td>
                    <td>{{ str_limit($users->part, 100) }}</td>
                    <td>{{ str_limit($users->genre, 100) }}</td>
                    <td>{{ str_limit($users->introduction, 100) }}</td>
                    <td>
                    @if(isset($user_form->likes))
                         {{ $user_form->likes->count() }}
                    @else
                         0
                    @endif
                  </td>
                    
                    
                    <td>{{$users->getCommentsAmountNum() }}</td>

         
                    
                </tr>
            @endforeach
        </tbody>
                        
</div>

    
 
@endsection