@extends('layout.layout')

@section('content')
    <div>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
            <label for="email">E-mail</label><br>
            <input type="text" id="email" name="email"><br>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
            <label for="password1">Password</label><br>
            <input type="text" id="password1" name="password1"><br>
            @if ($errors->has('password1'))
                <span>{{ $errors->first('password1') }}</span>
            @endif
            <label for="password2">Repeat Password</label><br>
            <input type="text" id="password2" name="password2"><br>
            @if ($errors->has('password2'))
                <span>{{ $errors->first('password2') }}</span>
            @endif
            <input type="submit" value="register">
        </form>
    </div>
@endsection
