@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="links">
            </div>
            <div class="title m-b-md">
                <h1>Post Details</h1>
            </div>
            <div>
                <table>
                    <tr>
                        <th>Vraag 1</th>
                        <th></th>
                        <th>Vraag 2</th>
                        <th></th>
                        <th>category</th>
                        <th>aan/uit</th>
                    </tr>
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
                            @if(!$post->active)
                                <form method="post" action="{{route('active.post')}}">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$post->id}}">
                                    <input type="hidden" id="input" name="input" value="off">
                                    <input type="submit" value="Zet uit">
                                </form>
                            @else
                                <form method="post" action="{{route('active.post')}}">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$post->id}}">
                                    <input type="hidden" id="input" name="input" value="on">
                                    <input type="submit" value="Zet aan">
                                </form>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{count($votes->where('question_id' , '=' , $post->question_id_2))}}</td>
                        <td></td>
                        <td>{{count($votes->where('question_id' , '=' , $post->question_id_1))}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
