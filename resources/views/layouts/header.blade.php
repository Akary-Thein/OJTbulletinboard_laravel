<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      SCM Bulletin Board
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        @if(Auth::user()->type == 0)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('user_list') }}">{{ __('Users') }}</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('user_profile') }}">{{ __('User') }}</a>
          </li>
        @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">{{ __('Posts') }}</a>
          </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <label class="nav-link">{{ Auth::user()->name }}</label>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
