@extends('layouts.app')

@section('content')

<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h1>All Posts and their categories, ordered by date descendingly</h1>
          
          @forelse ($posts as $postitem)
          <div class="category-heading">
            <h3>{{$postitem->title}}</h3>
          </div>
          <div class="card card-shadow mt-4">
            <div class="card-body">
              <p>{{$postitem->description}}</p>
              <p><strong>Categories: </strong>
              @foreach ($postitem->categories as $categitem)
                  {{$categitem->name }} |
              @endforeach
              </p>
              <h6>Posted On: {{$postitem->created_at->format('d-m-Y H:i:s')}}</h6>
            </div>
          </div>
          <br><br>
          @empty
          <div class="card card-shadow mt-4">
            <div class="card-body">
                <h1>No Post Available</h1>
            </div>
          </div>
          @endforelse
          <div class="your-paginate">
            {{$posts->links()}}
          </div>
      </div>
     
    </div>
  </div>
 
</div>
@endsection