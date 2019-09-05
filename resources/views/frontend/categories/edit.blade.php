@extends('layouts.frontend')

@section('main')
    <h2 class="text-center">Edit category</h2>

    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{route('frontend.categories.update',$category->id)}}" method="post">

        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="inputName">Category name</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}" id="inputName">
            @error('name')
            <div class="alert alert-danger">{{  $errors->first('name')}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status :</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>

        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>

    <hr>

    <p><a href="{{route('frontend.categories.show',$category->id)}}" class="btn btn-primary btn-block">
            Back to category Details
        </a></p>

@stop
