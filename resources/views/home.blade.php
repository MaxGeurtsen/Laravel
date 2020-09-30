@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('filter.posts')}}">
                            @csrf
                            <label for="category">Categorie</label><br>
                            <select name="category" id="category">
                                <option value="">Alle categoriën</option>
                                @foreach($categories as $category)
                                    @if(!$category->active)
                                        <option value="{{$category['id']}}">{{$category['category']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <label for="text" id="text">Tekst</label><br>
                            <input type="text" name="text" id="text">
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">
                                filter
                            </button>
                        </form>
                    </div>
                </div>
                @foreach($posts ?? '' as $post)
                    @php  /** @var App\posts  $post */  @endphp
                    @if(!$post->active)
                        <div class="card">
                            <div class="card-body">
                                @if(count($user_posts->where('post_id','=', $post->id) ) >= 1)
                                    <table>
                                        <td style="color:blue "><b>{{$post->questions($post->question_id_1)}}</b></td>
                                        <td>of</td>
                                        <td style="color:#4dc0b5 "><b>{{$post->questions($post->question_id_2)}}</b></td>
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
                                                <button type="submit" class="btn btn-primary">
                                                    {{$post->questions($post->question_id_1)}}
                                                </button>
                                            </form>
                                        </td>
                                        <td>or</td>
                                        <td>
                                            <form method="post" action="{{route('vote')}}">
                                                @csrf
                                                <input type="hidden" value="{{$post->question_id_2}}" id="vote"
                                                       name="vote">
                                                <input type="hidden" value="{{$post->id}}" id="id" name="id">
                                                <button type="submit" class="btn btn-primary">
                                                    {{$post->questions($post->question_id_2)}}
                                                </button>
                                            </form>
                                        </td>
                                    </table>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection
