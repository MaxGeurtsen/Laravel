@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                <h1>Categorie aanmaken</h1>
            </div>
            <div>
                <form method="post" action="{{route('store.category')}}">
                    @csrf
                    <label for="category">Nieuwe Categorie</label><br>
                    <input type="text" id="category" name="category"><br>
                    @error('category')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary">
                        post
                    </button>
                </form>
                @if($categories ?? '')
                    <h1>De categorie {{$categories['category']}} is aangemaakt! </h1>
                @endif
                <div>
                    <h2>Bestaande categoriën:</h2>
                    <table>
                        @foreach($Allcategories ?? '' as $category)
                            <tr>
                                <td><b>{{$category->category}}</b></td>
                                <td>is @if(!$category->active) aan @else uit @endif</td>
                                <td>
                                    <form method="post" action="{{route('active.category')}}">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{$category->id}}">
                                        @if(!$category->active)
                                            <input type="hidden" id="input" name="input" value="off">
                                            <button type="submit" class="btn btn-primary">
                                                zet uit
                                            </button>
                                        @else
                                            <input type="hidden" id="input" name="input" value="on">
                                            <button type="submit" class="btn btn-primary">
                                                zet aan
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
