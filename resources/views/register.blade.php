@extends('layout.layout')

@section('content')
    <div>
        <form method="post" action="{{ route('store') }}">

            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br>
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
            <label for="email">E-mail</label><br>
            <input type="text" id="email" name="email"><br>

            <label for="password1">Password</label><br>
            <input type="text" id="password1" name="password1"><br>

            <label for="password2">Repeat Password</label><br>
            <input type="text" id="password2" name="password2"><br>

            <input type="submit" value="register">
        </form>
    </div>
@endsection
