@extends('layouts.master')

@section('title','Edit Post')

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
        <h4>Edit Posts
          <a href="{{ url('admin/edit-post') }}" class="btn btn-danger float-end">Back</a>
        </h4>
      </div>
      <div class="card-body">
        
        <form action="{{url('admin/update-post/'.$post->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label >Post Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
          </div>
          <div class="mb-3">
            <label >Post Description</label>
            <input type="text" name="description" value="{{ $post->description }}" class="form-control" />
          </div>
          <div class="mb-3">
            <div class="form-group">
              <label class="col-sm-2 control-label">Categories:</label>
                <div class="col-sm-10">
                  @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{$category->id}}"
                      @if($post->categories->where('id', $category->id)->count()) 
                        checked="checked"
                      @endif
                      >
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