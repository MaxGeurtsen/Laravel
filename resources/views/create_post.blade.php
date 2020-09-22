@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            add
        </div>
        <div>
            <form method="post" action="{{route('store.post')}}">
                @csrf

                <label for="question1">vraag 1</label><br>
                <input type="text" id="question1" name="question1"><br>

                <label for="question2">vraag 2</label><br>
                <input type="text" id="question2" name="question2"><br>

                <label for="category">Categorie</label><br>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['category']}}</option>
                    @endforeach
                </select>
                <br>
                <input type="submit" value="Post">
            </form>
            @if($question1 ?? '')
                <h1>De vraag: {{$question1->question}} of {{$question2->question}}? met categorie: {{$category->category}}, is aangemaakt! </h1>
            @endif
        </div>
    </div>
@endsection
