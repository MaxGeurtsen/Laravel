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
                    <th>Post id</th>
                    <th>Vraag 1</th>
                    <th></th>
                    <th>Vraag 2</th>
                    <th></th>
                    <th>category</th>
                    <th>user id</th>
                </tr>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->question_id_1}}</td>
                    <td>of</td>
                    <td>{{$post->question_id_2}}</td>
                    <td>?</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->user_id}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
