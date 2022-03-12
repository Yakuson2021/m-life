@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">サンプルサイト</div>

                    <select>
                        @foreach($prefs as $index => $name)
                            <option value="{{ $index }}">$name</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
