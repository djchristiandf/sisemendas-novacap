<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Emendas - NOVACAP')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
            <strong>EMENDAS</strong> - NOVACAP
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- /.navbar-header -->
        <div class="collapse navbar-collapse" id="navbar-toggler">

          <ul class="navbar-nav">
            {{-- <li class="nav-item"><a href="#" class="nav-link">Emendas</a></li> --}}
            <li class="nav-item active"><a href="{{ route('amendments.index') }}" class="nav-link">Emendas</a></li>
          </ul>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item mr-2"><a href="#" class="btn btn-outline-secondary">Login</a></li>
            <li class="nav-item"><a href="#" class="btn btn-outline-primary">Registrar</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               {{-- {{ auth()->user()->name }} --}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="profile.html">Settings</a>
                <a class="dropdown-item" href="#">
                    {{-- onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} --}}
                </a>

                <form id="logout-form" action="#" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- content --}}
    @yield('content')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
  </body>
</html>
