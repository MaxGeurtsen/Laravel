@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Hallo {{ ucfirst(Auth::user()->name) }}!</h1>
        </div>
        <div class="card">
            <div class="card-body">
                @if(!\Illuminate\Support\Arr::flatten($posts))
                    <p>Je hebt nog geen posts!</p>
                    <a class="nav-link" href="{{route('create.post')}}">Maak vraag</a>
                @else
                    <h1>Mijn posts:</h1>
                    <table class="table">
                        <tr>
                            <th>Vraag 1</th>
                            <th>Vraag 2</th>
                            <th>category</th>
                            <th>aan/uit</th>
                            <th></th>
                        </tr>
                        @foreach($posts ?? "" as $post)
                            <tr>
                                <td>{{$post->questions($post->question_id_1)}}</td>
                                <td>{{$post->questions($post->question_id_2)}}</td>
                                <td>{{$post->category->category}}</td>
                                @if(!$post->active)
                                    <td>aan</td>
                                @else
                                    <td>uit</td>
                                @endif
                                <td>
                                    <form method="post" action="{{route('edit.post')}}">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{$post->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            details
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection
