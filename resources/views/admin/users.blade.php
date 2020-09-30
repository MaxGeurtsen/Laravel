@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th scope="col">naam</th>
                                <th scope="col">e-mail</th>
                                <th scope="col">type</th>
                                <th scope="col">aangemaakt op</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)

                                @php  /** @var App\User  $user */  @endphp
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->type}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <form method="post" action="{{route('users.show')}}">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
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
            </div>
        </div>
        <div>
        </div>
    </div>
@endsection
