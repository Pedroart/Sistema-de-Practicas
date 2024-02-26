<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" sizes="192x192" href="{{ asset('favicons/android-chrome-192x192.png') }}">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="{{ url("/") }}/web/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ url("/") }}/web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ url("/") }}/web/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="{{ url("/") }}/web/css/style.css">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('index.welcome')}}">
            <x-application-logo height="50%"/>
        </a>
      </div>
      <div class="navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          @include('plantilla.web_navbar')
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
    <div class="container">
        @yield('content')
    </div>
  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">

      <h3>Contactanos!</h3>

      <form class="mc-trial row">
        <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
          <div class=" controls">
            <input name="name" placeholder="Ingresa tu Nombre" class="form-control" type="text">
          </div>
        </div>
        <!-- End email input -->
        <div class="form-group col-md-3 col-sm-4">
          <div class=" controls">
            <input name="EMAIL" placeholder="Ingresa tu correo" class="form-control" type="email">
          </div>
        </div>
        <!-- End email input -->
        <div class="col-md-2 col-sm-4">
          <p>
            <button name="submit" type="submit" class="btn btn-block btn-submit">
            Enviar <i class="fa fa-arrow-right"></i></button>
          </p>
        </div>
      </form>
      <!-- End newsletter-form -->
      <ul class="social-links">
        <li><a href="{{config('temaweb.redes_sociales.x')}}"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="{{config('temaweb.redes_sociales.facebook')}}"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="{{config('temaweb.redes_sociales.likedin')}}"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2024 P.ART . All rights reserved
      <div class="credits">
        Designed by <a href="{{route('index.welcome')}}">{{ config('temaweb.creditos', 'Laravel') }}</a>
      </div>
    </div>
  </footer>
  <!--/ Footer-->

  <script src="{{ url("/") }}/web/js/jquery.min.js"></script>
  <script src="{{ url("/") }}/web/js/jquery.easing.min.js"></script>
  <script src="{{ url("/") }}/web/js/bootstrap.min.js"></script>
  <script src="{{ url("/") }}/web/js/custom.js"></script>
  <script src="{{ url("/") }}/web/contactform/contactform.js"></script>

</body>

</html>
