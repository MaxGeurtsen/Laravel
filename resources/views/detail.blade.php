@extends('layout.layout')

@section('content')
<div>
    <div class="content">
        <div class="links">
            <a href="{{route('news')}}">news</a>
        </div>
        <div class="title m-b-md">
            detail
        </div>
        <div>
            @foreach($questions as $q)
                    <li>{{$q['test']}}</li>
                    <li>{{$q['test']}}</li>
                    <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
