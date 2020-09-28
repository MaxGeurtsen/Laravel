@extends('layouts.app')

@section('content')
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
                    @foreach($categories as $category)
                        @if(!$category->active)
                            <option value="{{$category['id']}}">{{$category['category']}}</option>
                        @endif
                    @endforeach
                </select>
                <br>
                <input type="submit" value="Post">
            </form>
            @if($question1 ?? '')
                <p>De vraag: <b>{{$question1->question}} of {{$question2->question}}?</b> met
                    categorie: <b>{{$category->category}}</b> is aangemaakt! </p>
            @endif
        </div>
    </div>
@endsection
