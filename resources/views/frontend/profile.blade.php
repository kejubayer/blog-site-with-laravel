@extends('layouts.frontend')

@section('main')

    <div class="card col-md-10 m-3">
        <div class="card-header text-center">
            My Profile
        </div>
        <img src="{{url('uploads/images',optional($user)->photo)}}" class="card-img-top" alt="">
        <div class="card-body">
            <div>
                <p class="card-title float-left font-weight-bold pr-1">{{"Full Name : "}}</p>
                <p>{{$user->first_name}} {{$user->last_name}}</p>
            </div>
            <div>
                <p class="card-title float-left font-weight-bold pr-1">{{"Username : "}}</p>
                <p>{{$user->username}}</p>

            </div>
            <div>
                <p class="card-title float-left font-weight-bold pr-1">{{"Email Address : "}}</p>
                <p>{{$user->email}}</p>
            </div>
            <div>
                <a href="{{route('frontend.edit_profile')}}" class="btn btn-primary">Edit Profile</a>
                <a href="{{route('frontend.categories.index')}}" class="btn btn-info">Categories</a>
            </div>


        </div>
    </div>

@stop
