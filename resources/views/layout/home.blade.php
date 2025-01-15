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
</html>