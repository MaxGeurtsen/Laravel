@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            categorie
        </div>
        <div>
            <form method="post" action="{{route('store.category')}}">
                @csrf

                <label for="category">categorie</label><br>
                <input type="text" id="category" name="category"><br>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="submit" value="Post">
            </form>
            @if($categories ?? '')
                <h1>De categorie {{$categories['category']}} is aangemaakt! </h1>
            @endif

        </div>
    </div>
@endsection
