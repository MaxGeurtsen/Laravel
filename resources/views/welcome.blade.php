@extends ('layout.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="{{route('detail')}}">detail</a>
                <a href="{{route('register')}}">register</a>
            </div>
        </div>
    </div>

@endsection
