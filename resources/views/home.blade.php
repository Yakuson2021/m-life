@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in !（ログインできました！）

<a href="{{ route('index') }}">動画一覧ページへ</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
