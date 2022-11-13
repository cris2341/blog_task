@extends('layouts.master')

@section('title','Add Post')

@section('content')

<div class="container-fluid px-4">
  
    <div class="card mt-4">

      @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
        @endforeach
      </div>  
      @endif
      
      <div class="card-header">
        <h4> Add Posts
          <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
        </h4>
      </div>
      <div class="card-body">
        
        <form action="" method="POST">
          @csrf
          <div class="mb-3">
            <label >Post Title</label>
            <input type="text" name="title" class="form-control" />
          </div>
          <div class="mb-3">
            <label >Post Description</label>
            <input type="text" name="description" class="form-control" />
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label class="col-sm-2 control-label">Categories:</label>
                <div class="col-sm-10">
                  @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{$category->id}}">
                    <label class="">{{ucfirst($category->name)}}</label>
                    <br>
                  @endforeach
                </div>
            </div>
            
          </div>
          <div class="col-md-8">
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Save Post</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection