@extends('layouts.frontend')

@section('main')
    <h2 class="text-center">Login Your Account</h2>
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{ session('message') }}
        </div>
        @endif
    <form action="{{route('frontend.login')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" value="{{old("email")}}" id="inputEmail"
                   placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{  $errors->first('email')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{  $errors->first('password')}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
@stop
