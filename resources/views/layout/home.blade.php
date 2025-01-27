<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>home page</title>
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd !important;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Food Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Home</a>
            </li>
            @if (Auth::user())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin') }}">Dashboard</a>
            </li> 
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>  
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </div> 
  </div>
    <div class="container">
        @yield('content')
</div>
</body>
<footer class="footer-10" style="background-color: #e3f2fd !important;">
  <div class="container">
    <div class="row mb-5 pb-3 no-gutters">
      <div class="col-md-4 mb-md-0 mb-4 d-flex">
        <div class="con con-1 w-100 py-5">
          <div class="con-info w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-call"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-md-0 mb-4 d-flex">
        <div class="con con-2 w-100 py-5">
          <div class="con-info w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-mail"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-md-0 mb-4 d-flex">
        <div class="con con-3 w-100 py-5">
          <div class="con-info w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-pin"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-4 mb-md-0 mb-4">
            <h2 class="footer-heading">About</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="d-block">Out story</a></li>
              <li><a href="#" class="d-block">Awards</a></li>
              <li><a href="#" class="d-block">Our Team</a></li>
              <li><a href="#" class="d-block">Career</a></li>
            </ul>
          </div>
          <div class="col-md-4 mb-md-0 mb-4">
            <h2 class="footer-heading">Company</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="d-block">Our services</a></li>
              <li><a href="#" class="d-block">Clients</a></li>
              <li><a href="#" class="d-block">Contact</a></li>
              <li><a href="#" class="d-block">Press</a></li>
            </ul>
          </div>
          <div class="col-md-4 mb-md-0 mb-4">
            <h2 class="footer-heading">Resources</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="d-block">Blog</a></li>
              <li><a href="#" class="d-block">Newsletter</a></li>
              <li><a href="#" class="d-block">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-5 mb-md-0 mb-4">
        <h2 class="footer-heading">Subscribe</h2>
        <form action="#" class="subscribe-form">
          <div class="form-group d-flex">
            <input type="text" class="form-control rounded-left" placeholder="Enter email address">
            <button type="submit" class="form-control submit rounded-right">Subscribe</button>
          </div>
          <span class="subheading">Get digital marketing updates in your mailbox</span>
        </form>
      </div>
    </div>
    <div class="row mt-5 pt-4 border-top">
      <div class="col-md-6 col-lg-4 text-md-right">
      </div>
    </div>
  </div>
</footer>
</html>