<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

  <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css">

  <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/main.css">

  <title>Pets Crazy Life</title>
</head>

<body>
  <header class="top-bar">
    <div class="container p-0">
      <div class="row">
        <div class="col-6">
          <div id="MyClockDisplay" class="clock time" onload="showTime()"></div>
        </div>
        <div class="col-6">
          <ul>
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <nav class="navbar nav-border mainlogo">
    <div class="container ">
      <a class="navbar-brand m-auto logo" href="#">
        <img src="{{ asset('frontend_assets') }}/images/logo.png" alt="" width="180">
      </a>
    </div>
  </nav>

  <nav class="navbar navbar-expand-md navbarborder">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend_assets') }}/images/logo.png" alt="" width="180">
      </a>

      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link @yield('home_active')" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Bird</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Fish</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mammals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('about_active')" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('contact_active')" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <div class="backToTop">
    <i class="fas fa-chevron-up"></i>
  </div>

  @include('frontend.body.footer')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
  <script src="{{ asset('frontend_assets') }}/js/script.js"></script>

  <script>
    // Top Bar Wach Display.
    function showTime(){
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";
      
      if(h == 0){
        h = 12;
      }
      
      if(h > 12){
        h = h - 12;
        session = "PM";
      }
      
      h = (h < 10) ? "0" + h : h; m=(m < 10) ? "0" + m : m; s=(s < 10) ? "0" + s : s; var time=h + ":" + m + ":" + s + " " + session; 
      document.getElementById("MyClockDisplay").innerText=time;
      document.getElementById("MyClockDisplay").textContent=time; setTimeout(showTime, 1000);
    } 
    
    showTime();
    
  </script>

</body>

</html>