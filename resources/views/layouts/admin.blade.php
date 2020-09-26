<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="/img/favicon.png" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/admin.css">
  {!! HTML::style('css/admin.css') !!}
  <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-white fixed-top">
      <a href="#" class="navbar-brand"><span class="bg-dark">block</span><span
          class="bg-success">Code</span></a>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse"
        data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navBlog" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
            <div class="dropdown-menu" aria-labelledby="navBlog">
              <a href="" class="dropdown-item">Post</a>
              <a href="" class="dropdown-item">Tag</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navProject" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project</a>
            <div class="dropdown-menu" aria-labelledby="navProject">
              <a href="" class="dropdown-item">Post</a>
              <a href="" class="dropdown-item">Tag</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navTemplate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Template</a>
            <div class="dropdown-menu" aria-labelledby="navTemplate">
              <a href="" class="dropdown-item">Post</a>
              <a href="" class="dropdown-item">Tag</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  @yield('content')
</body>
<footer>
  <div class="header">
    <div class="logo">
      <span class="bg-dark">block</span><span class="bg-success">Code</span>
    </div>
    <div class="nav-footer">
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Terms of Service</a></li>
        <li><a href="">Privacy Policy</a></li>
      </ul>
    </div>
  </div>
  <div class="bottom">
    &copy; 2020 <a href="">Block Code</a> | Made with ❤️ by <a href="">Fauzi Galih Aji Saputro</a>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
{!! HTML::script('js/script.js') !!}

</html>