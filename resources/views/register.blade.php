@extends('layout.layout')

@section('content')
    <div>
        @if($name ?? '')
            <h1>Created user {{$name}} with e-mail: {{$email}}</h1>
        @endif
    </div>
    <div>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span><br>
            @endif
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email"><br>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span><br>
            @endif
            <label for="password1">Password</label><br>
            <input type="password" id="password1" name="password1"><br>
            @if ($errors->has('password1'))
                <span>{{ $errors->first('password1') }}</span><br>
            @endif
            <label for="password2">Repeat Password</label><br>
            <input type="password" id="password2" name="password2"><br>
            @if ($errors->has('password2'))
                <span>{{ $errors->first('password2') }}</span><br>
            @endif
            <input type="submit" value="register">
        </form>
    </div>
@endsection
