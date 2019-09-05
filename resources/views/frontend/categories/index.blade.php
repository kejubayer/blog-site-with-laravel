@extends('layouts.frontend')

@section('main')
    <div class="well">
        <h2>Category list</h2>
        @if(session()->has('message'))
            <div class="alert alert-{{session('type')}}">
                {{ session('message') }}
            </div>
        @endif
        <p class="btn btn-primary">
            <a href="{{route('frontend.categories.create')}}" class="text-light">
                Add new category
            </a>
        </p>

        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->status === 1 ? 'Active' : 'Inactive'  }}</td>
                    <td>
                        <a href="{{route('frontend.categories.show',$category->id)}}" class="btn btn-info">
                            Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->links() !!}
    </div>
@stop
