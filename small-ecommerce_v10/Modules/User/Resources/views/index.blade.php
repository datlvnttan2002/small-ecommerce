@extends('user::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('user.name') !!}
    </p>
    <script src="{{asset("modules/user/js/test.js")}}"></script>
@endsection
