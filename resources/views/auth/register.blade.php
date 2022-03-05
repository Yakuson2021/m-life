@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">*{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">*{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">*{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">*{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <!--ここから追加したいカラム　担当パート-->
                        <div class="form-group row">
                        　<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Part') }}</label>
                        
                        　<div class="col-md-6">
                        　<input id="name" type="text" class="form-control @error('part') is-invalid @enderror" name="part" value="{{ old('part') }}" required autocomplete="part" autofocus>
                        
                        @error('part')
                        　<span class="invalid-feedback" role="alert">
                       　　 <strong>{{ $message }}</strong>
                        　</span>
                        @enderror
                        　</div>
                        </div>
                        
                        <!--ここから追加したいカラム　ジャンル-->
                        <div class="form-group row">
                        　<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>
                        
                        　<div class="col-md-6">
                        　<input id="name" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') }}" required autocomplete="genre" autofocus>
                        
                        @error('genre')
                        　<span class="invalid-feedback" role="alert">
                       　　 <strong>{{ $message }}</strong>
                        　</span>
                        @enderror
                        　</div>
                        </div>
                        
                        <!--ここから追加したいカラム　一言自己アピール-->
                        <div class="form-group row">
                        　<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Introduction') }}</label>
                        
                        　<div class="col-md-6">
                        　<input id="name" type="text" class="form-control @error('introduction') is-invalid @enderror" name="introduction" value="{{ old('introduction') }}" required autocomplete="introduction" autofocus>
                        
                        @error('introduction')
                        　<span class="invalid-feedback" role="alert">
                       　　 <strong>{{ $message }}</strong>
                        　</span>
                        @enderror
                        　</div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
