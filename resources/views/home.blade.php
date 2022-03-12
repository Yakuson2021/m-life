@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    すでにログイン済みです<p><p></p></p>

<a href="{{ route('check') }}">マイページへ</a><p></p>
<a href="{{ route('top') }}">サイトトップへ</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
