@extends('layouts.master')

@section('title','View Post')

@section('content')

<div class="container-fluid px-4">
  
  

    <div class="card mt-4">
      <div class="card-header">
        <h4> View Posts
          <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
        </h4>
      </div>
      <div class="card-body">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Post Description</th>
                <th>Post Categories</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->description }}</td>
                  <td>
                    @foreach ($item->categories as $category)
                      {{$category->name}} |
                  @endforeach
                  </td>
                  <td>
                    <a href="{{ url('admin/edit-post/'.$item->id) }}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <a href="{{ url('admin/delete-post/'.$item->id) }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>

@endsection