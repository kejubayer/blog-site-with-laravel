@extends('layouts.frontend')

@section('main')

    <div class="card col-md-10 m-3">
        <div class="card-header text-center">
            My Profile
        </div>
        <img src="{{url('uploads/images',optional($user)->photo)}}" class="card-img-top" alt="Profile Picture">
        <div class="card-body">
            <div>
                <h5 class="card-title">Full Name : {{$user->first_name}} {{$user->last_name}}</h5>
                <h5 class="card-title">Username : {{$user->username}}</h5>
                <h5 class="card-title">Email Address : {{$user->email}}</h5>
                <a href="{{route('frontend.edit_profile')}}" class="btn btn-primary">Edit Profile</a>

            </div>
        </div>
    </div>

@stop
