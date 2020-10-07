@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('users.edit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" class="form-control"
                                           value="{{$user->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" class="form-control"
                                           value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if($user->id != \Illuminate\Support\Facades\Auth::id())
                                <div class="form-group row">
                                    <label for="type"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                    <div class="col-md-6">


                                        <select name="type" id="type" class="form-control">
                                            @if($user->type == 'admin')
                                                <option value="default">default</option>
                                                <option selected value="admin">admin</option>
                                            @else
                                                <option selected value="default">default</option>
                                                <option value="admin">admin</option>
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            @endif
                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('wijzig') }}
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
@endsection
