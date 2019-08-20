@extends('layouts.frontend')


@section('main')

    <div class="card mt-4">
        <div class="card-header text-center">
            Edit Profile
        </div>
        @if(session()->has('message'))
            <div class="alert alert-{{session('type')}}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('frontend.update_photo')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputPhoto">Profile Photo</label>
                    <input type="file" name="photo" class="form-control" id="inputPhoto" placeholder="Change photo">
                    @error('photo')
                    <div class="alert alert-danger">{{  $errors->first('photo')}}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary btn-block">Change Profile Photo </button>
            </form>
        </div>
        <div class="card-body">
            <form action="{{route('frontend.edit_profile')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" id="inputFirstName">
                    @error('first_name')
                    <div class="alert alert-danger">{{  $errors->first('first_name')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" id="inputLastName"
                           >
                    @error('last_name')
                    <div class="alert alert-danger">{{  $errors->first('last_name')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" name="username" class="form-control" value="{{$user->username}}" id="inputUsername"
                           >
                    @error('username')
                    <div class="alert alert-danger">{{  $errors->first('username')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" id="inputEmail"
                           >
                    @error('email')
                    <div class="alert alert-danger">{{  $errors->first('email')}}</div>
                    @enderror
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else
                        .</small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
            </form>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header text-center">
            Change Password
        </div>
        <div class="card-body">
            <form action="{{route('frontend.update_password')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                    @error('password')
                    <div class="alert alert-danger">{{  $errors->first('password')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           id="password_confirmation" required>
                    @error('password')
                    <div class="alert alert-danger">{{  $errors->first('password')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" required>
                </div>
                @error('old_password')
                <div class="alert alert-danger">{{  $errors->first('old_password')}}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-block">Change Password</button>
            </form>
        </div>
    </div>


    @stop
