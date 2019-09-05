@extends('layouts.frontend')

@section('main')
    @if(session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{ session('message') }}
        </div>
    @endif
    <h2>{{$category->name}}</h2>
    <p>
        ID : {{$category->id}}
    </p>
    <p>
        Slug : {{$category->slug}}
    </p>
    <p>
        Status : {{$category->status === 1 ? 'Active' : 'Inactive'}}
    </p>
    <p>
        Created at : {{$category->created_at}}
    </p>
    <div>
        <a href="{{route('frontend.categories.edit',$category->id)}}" class="btn btn-info">
            Edit
        </a>
        <form action="{{ route('frontend.categories.delete', $category->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>
    </div>
    <hr>
    <div>
        <a href="{{route('frontend.categories.index',$category->id)}}" class="btn btn-info">
            Back to categories list
        </a>
    </div>

@stop




