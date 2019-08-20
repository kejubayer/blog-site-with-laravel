@extends('layouts.frontend')

@section('main')
    <h2 class="text-center">Register Your Account</h2>
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{ session('message') }}
        </div>
        @endif
    <form action="{{route('frontend.register')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{old("first_name")}}" id="inputFirstName"
                   placeholder="First Name">
            @error('first_name')
            <div class="alert alert-danger">{{  $errors->first('first_name')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{old("last_name")}}" id="inputLastName"
                   placeholder="Last Name">
            @error('last_name')
            <div class="alert alert-danger">{{  $errors->first('last_name')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputUsername">Username</label>
            <input type="text" name="username" class="form-control" value="{{old("username")}}" id="inputUsername"
                   placeholder="Username">
            @error('username')
            <div class="alert alert-danger">{{  $errors->first('username')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" value="{{old("email")}}" id="inputEmail"
                   placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{  $errors->first('email')}}</div>
            @enderror
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else
                .</small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{  $errors->first('password')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{  $errors->first('password')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPhoto">Photo</label>
            <input type="file" name="photo" class="form-control" id="inputPhoto" placeholder="Upload photo">
            @error('photo')
            <div class="alert alert-danger">{{  $errors->first('photo')}}</div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
    </form>
@stop
