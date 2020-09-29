@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                <h1>Nieuwe vraag maken:</h1>
            </div>
            <div>
                <form method="post" action="{{route('store.post')}}">
                    @csrf

                    {{--                <label for="question1"></label><br>--}}
                    <input type="text" id="question1" name="question1">
                    of
                    {{--                <label for="question2"></label><br>--}}
                    <input type="text" id="question2" name="question2">
                    ?
                    <br>
                    <label for="category">Categorie</label><br>
                    <select name="category" id="category">
                        <option value="">categoriën</option>
                        @foreach($categories as $category)
                            @if(!$category->active)
                                <option value="{{$category['id']}}">{{$category['category']}}</option>
                            @endif
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">
                        post
                    </button>
                </form>
                @if($succes ?? '' == true)
                    De vraag is aangemaakt!
                @endif
            </div>
        </div>
    </div>
@endsection
