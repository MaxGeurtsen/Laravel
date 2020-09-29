@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach($posts ?? '' as $post)
                    @php  /** @var App\posts  $post */  @endphp
                    @if(!$post->active)
                        <div class="card">
                            <div class="card-body">

                                @if(count($user_posts->where('post_id','=', $post->id) ) >= 1)
                                    <table>
                                        <td><b>{{$post->questions($post->question_id_1)}}</b></td>
                                        <td>or</td>
                                        <td><b>{{$post->questions($post->question_id_2)}}</b></td>
                                        <td>{{$post->category->category}}</td>
                                        <tr>
                                            <td>{{count($votes->where('question_id' , '=' , $post->question_id_1))}}</td>
                                            <td></td>
                                            <td>{{count($votes->where('question_id' , '=' , $post->question_id_2))}}</td>
                                        </tr>
                                    </table>
                                    <div
                                        style="background-color: #4dc0b5;display: block;border:1px solid #ccc!important;">
                                        <div
                                            style="background-color:blue!important;height:24px;width:{{(count($votes->where('question_id' , '=' , $post->question_id_1)))/((count($votes->where('question_id' , '=' , $post->question_id_1)))+(count($votes->where('question_id' , '=' , $post->question_id_2))))*100}}%"></div>
                                    </div>
                                @else
                                    <table>
                                        <td>
                                            <form method="post" action="{{route('vote')}}">
                                                @csrf
                                                <input type="hidden" value="{{$post->question_id_1}}" id="vote"
                                                       name="vote">
                                                <input type="hidden" value="{{$post->id}}" id="id" name="id">
                                                <input type="submit" value="{{$post->questions($post->question_id_1)}}">
                                            </form>
                                        </td>
                                        <td>{{count($votes->where('question_id' , '=' , $post->question_id_1))}}</td>
                                        <td>or</td>
                                        <td>
                                            <form method="post" action="{{route('vote')}}">
                                                @csrf
                                                <input type="hidden" value="{{$post->question_id_2}}" id="vote"
                                                       name="vote">
                                                <input type="hidden" value="{{$post->id}}" id="id" name="id">
                                                <input type="submit" value="{{$post->questions($post->question_id_2)}}">
                                            </form>
                                        </td>
                                        <td>{{count($votes->where('question_id' , '=' , $post->question_id_2))}}</td>
                                        <td>{{$post->category->category}}</td>
                                    </table>
                                @endif

                            </div>
                        </div>
                    @endif
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
