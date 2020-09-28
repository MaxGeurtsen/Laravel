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
                                <th>Vraag 1</th>
                                <th></th>
                                <th>Vraag 2</th>
                                <th></th>
                                <th> Category</th>
                                <th> User</th>
                            </tr>
                            @foreach($posts ?? '' as $post)
                                @php  /** @var App\posts  $post */  @endphp
                                <tr>
                                    <td>{{$post->questions($post->question_id_2)}}</td>
                                    <td>of</td>
                                    <td>{{$post->questions($post->question_id_1)}}</td>
                                    <td>?</td>
                                    <td>{{$post->category->category}}</td>
                                    <td>{{$post->user->name}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
