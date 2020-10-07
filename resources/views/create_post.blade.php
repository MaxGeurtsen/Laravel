@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                <h1>Nieuwe vraag maken:</h1>
            </div>
            <div>
                @if(\Illuminate\Support\Facades\Auth::user()->type == "admin" || $count >= 2)
                    <form method="post" action="{{route('store.post')}}">
                        @csrf
                        <input type="text" id="question1" name="question1">
                        or
                        <input type="text" id="question2" name="question2">
                        ?
                        <br>
                        <label for="category">Categorie</label><br>
                        <select name="category" id="category">
                            <option value="">Categoriën</option>
                            @foreach($categories as $category)
                                @if(!$category->active)
                                    <option value="{{$category['id']}}">{{$category['category']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            post
                        </button>
                    </form>
                    @error('category')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    @if($succes ?? '' == true)
                        De vraag is aangemaakt!
                    @endif
                @else
                    <p>Je moet eerst 2 keer stemmen voordat je een post kan maken!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
