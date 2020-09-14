@extends('layout.layout')

@section('content')
<div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="links">
            <a href="{{route('news')}}">news</a>
        </div>
        <div class="title m-b-md">
            detail
        </div>
        <div>
            @foreach($items as $item)
                @if($item['id']==$id   )
                    <li>{{$item['title']}}</li>
                    <li>{{$item['description']}}</li>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
