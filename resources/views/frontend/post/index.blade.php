@extends('layouts.app')

@section('content')

<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
          <div class="category-heading">
            <h4>{{$category->name}}</h4>
          </div>
          @forelse ($category_posts as $postitem)
          <div class="card card-shadow mt-4">
            <div class="card-body">
              <h2 class="post-heading">{{$postitem->title}}</h2>
              <p>{{$postitem->description}}</p>
              <h6>Posted On: {{$postitem->created_at->format('d-m-Y')}}</h6>
            </div>
          </div>
          
          @empty
          <div class="card card-shadow mt-4">
            <div class="card-body">
                <h1>No Post Available</h1>
            </div>
          </div>
          @endforelse
          <div class="your-paginate">
            {{$category_posts->links()}}
          </div>
      </div>
     
    </div>
  </div>
 
</div>
@endsection