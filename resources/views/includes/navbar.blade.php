@section('navbar')
<nav class="navbar navbar-expand-lg   navbar-dark bg-dark">
  <a class="navbar-brand a_nav" href="{{route('book.index')}}" >BookStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link a_nav" href="{{route('book.index')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link a_nav" href="{{route('author.index')}}">Authors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link a_nav" href="{{route('publisher.index')}}">Publishers</a>
      </li>
    </ul>
 
    @if(auth()->user())
        <a  href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="a_nav btn btn-outline-success mr-2 my-2 my-sm-0" type="button" >
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
      <a class=" a_nav btn btn-outline-success mr-2 my-2 my-sm-0" type="button" href="{{ route('register') }}">Register</a>
      <a class=" a_nav btn btn-outline-success my-2 my-sm-0" type="button" href="{{route('login')}}">Login</a>
    @endif  
  </div>
</nav>
@endsection