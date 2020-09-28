@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            {{ __('You are logged in!') }}
                        @endif
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
                            @foreach($posts ?? '' as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->question_id_1}}</td>
                                    <td>of</td>
                                    <td>{{$post->question_id_2}}</td>
                                    <td>?</td>
                                    <td>{{$post->category_id}}</td>
                                    <td>{{$post->user_id}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
