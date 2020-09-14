@extends ('layout.layout')

@section('content')
    {{--  //  <div class="flex-center position-ref full-height">--}}
    <div class="content">
        <div class="links">
            <a href="{{route('add')}}">add</a>
        </div>
        <div class="title m-b-md">
            News Items
        </div>
        <div class="links">
            @foreach($items as $item)
                <a  href="{{route('detail')}}?id={{$item['id']}}">{{$item['title']}}</a>
                <br>
            @endforeach
        </div>
    </div>
    {{--    </div>--}}

@endsection
