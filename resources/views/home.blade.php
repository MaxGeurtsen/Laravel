@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($posts ?? '' as $post)
                    @php  /** @var App\posts  $post */  @endphp
                    <div class="card">
                        <div class="card-body">
                            <table>
                                @foreach($up as $userpost)
                                    @if($userpost->user_id == \Illuminate\Support\Facades\Auth::id() && $userpost->post_id == $post->id)
                                        voted
                                    @elseif($userpost->user_id != \Illuminate\Support\Facades\Auth::id() && $userpost->post_id != $post->id || !$userpost)
                                        can still vote
                                    @endif
                                @endforeach
                                <td>
                                    <form method="post" action="{{route('vote')}}">
                                        @csrf
                                        <input type="hidden" value="{{$post->question_id_1}}" id="vote" name="vote">
                                        <input type="hidden" value="{{$post->id}}" id="id" name="id">
                                        <input type="submit" value="{{$post->questions($post->question_id_1)}}">
                                    </form>
                                </td>
                                <td>{{count($votes->where('question_id' , '=' , $post->question_id_1))}}</td>
                                <td>or</td>
                                <td>
                                    <form method="post" action="{{route('vote')}}">
                                        @csrf
                                        <input type="hidden" value="{{$post->question_id_2}}" id="vote" name="vote">
                                        <input type="hidden" value="{{$post->id}}" id="id" name="id">
                                        <input type="submit" value="{{$post->questions($post->question_id_2)}}">
                                    </form>
                                </td>
                                <td>{{count($votes->where('question_id' , '=' , $post->question_id_2))}}</td>
                                <td>{{$post->category->category}}</td>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
