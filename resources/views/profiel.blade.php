@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Hallo {{Auth::user()->name}}!</h1>
        </div>
        <div>
            <h1>Mijn posts:</h1>
            <table class="table">
                <tr>
                    <th>Vraag 1</th>
                    <th></th>
                    <th>Vraag 2</th>
                    <th></th>
                    <th>category</th>
                    <th>aan/uit</th>
                </tr>
                @foreach($posts ?? "" as $post)
                    <tr>
                        <td>{{$post->questions($post->question_id_1)}}</td>
                        <td>of</td>
                        <td>{{$post->questions($post->question_id_2)}}</td>
                        <td>?</td>
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
                                    wijzig
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
