<div class="global-navbar">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        
      </div> 
    </div>
  </div>
  <nav class="navbar navbar-expand-lg bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blog</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('user_page')}}">Home</a>
          </li>
          @php
              $categories = App\Models\Category::all();
          @endphp
          @foreach ($categories as $cateitem)
              <li class="nav-item">
                <a href="{{url('category/'.$cateitem->id)}}" class="nav-link">{{ $cateitem->name }}</a>
              </li>
          @endforeach
          
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if (Auth::guest())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('register')}}">Register</a>
          </li>
          @elseif (Auth::user()->role_as == '1')
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('admin/dashboard')}}">Admin_Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
            @csrf
        </form>
          </li>
          @else
          <li class="nav-item">
            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
            @csrf
        </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <h3>Here on header: Home is the list of all posts, and others are categories</h3>
</div>