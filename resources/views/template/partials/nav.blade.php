<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}">
        <img alt="Brand" src="{{ asset('favicon.ico')}}">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{route('home')}}">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="{{route('users.login')}}">Users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li class="dropdown">
            <a href="{{route('users.panel')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('users.panel')}}">Profile</a></li>
              <li><a href="{{route('users.edit.profile')}}">Change my avatar</a></li>
              <li><a href="{{route('users.edit.password')}}">Change my password</a></li>
            </ul>
          </li>
          <li><a href="{{route('users.logout')}}">Logout</a></li>
        @else
          <li><a href="{{route('users.login')}}">Login</a></li>
          <li><a href="{{route('users.register')}}">Sign Up</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>