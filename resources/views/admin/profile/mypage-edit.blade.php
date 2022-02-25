@extends('layouts.admin')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>m-lifeマイページ編集</title>
    </head>
    <body>
        <h1>m-life　マイページ編集</h1>
        マイページを編集する画面
            <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                
    @if (count($errors) > 0)
     <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
     </ul>
    @endif
        
    　<div class="form-group row">
    　<label class="col-md-2">氏名(name)</label>
    　　<div class="col-md-10">
    　<input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
    　　</div>
    </div>
        
    </body>
</html>