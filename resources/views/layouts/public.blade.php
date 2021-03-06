@php
    $arrAction = explode('\\', Route::currentRouteAction());
    $arrController = explode('@', $arrAction[3]);
    $controller = $arrController[0];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>
    @if(View::hasSection('title'))
      @yield('title') - {{ ucwords(str_replace('_', ' ', config('app.name'))) }}
    @else
      {{ ucwords(str_replace('_', ' ', config('app.name'))) }}
    @endif
  </title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-white fixed-top">
      <a href="#" class="navbar-brand"><span class="bg-dark play-font">block</span><span
          class="bg-success play-font">Code</span></a>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
        data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link @if ($controller === 'PageController') active @endif">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('blog') }}" class="nav-link @if ($controller === 'BlogController') active @endif">Blog</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('project') }}" class="nav-link @if ($controller === 'ProjectController') active @endif">Project</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('template') }}" class="nav-link @if ($controller === 'TemplateController') active @endif">Template</a>
          </li>
        </ul>
        <form action="{{ url('search') }}" method="POST" class="form-inline my-2 my-lg-0 search">
          @csrf
          <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
          <button class="btn btn-outline my-2 my-sm-0" type="submit"><i class="fa fa-search"
              aria-hidden="true"></i></button>
        </form>
      </div>
    </nav>
  </header>
  @yield('content')
</body>
<footer>
  <div class="header">
    <div class="logo">
      <a href="{{ url('/') }}"><span class="bg-dark">block</span><span class="bg-success">Code</span></a>
    </div>
    <div class="nav-footer">
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('about') }}">About</a></li>
        <li><a href="{{ url('contact') }}">Contact</a></li>
        <li><a href="{{ url('terms-of-service') }}">Terms of Service</a></li>
        <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
      </ul>
    </div>
  </div>
  <div class="bottom">
    &copy; 2020 <a href="{{ url('/') }}">Block Code</a> | Made with ❤️ by <a href="{{ url('about') }}">Fauzi Galih Aji Saputro</a>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>

</html>