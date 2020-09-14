@extends('layout.layout')

@section('content')
    <div class="content">
        <div class="links">
            <a href="{{route('news')}}">news</a>
        </div>
        <div class="title m-b-md">
            add
        </div>
        <div>
            <form>
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title"><br>
                <label for="description">Beschrijving</label><br>
                <input type="text" id="description" name="description"><br>
                <input type="submit" value="Post">
            </form>
        </div>
    </div>
@endsection
