@extends('layout.layouts.app')

@section('content')
<div>
    <div class="content">
        <div class="links">
        </div>
        <div class="title m-b-md">
            <h1>Post Details</h1>
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
