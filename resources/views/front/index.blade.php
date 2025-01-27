@extends('layout.home')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="width: 1268px ">
    <div class="carousel-item active">
      <img src="{{ asset("img/01.jpg") }}" class="d-block m-3" width="1268px" height="500" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset("img/02.jpg") }}" class="d-block m-3" width="1268px" height="500" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset("img/03.jpg") }}" class="d-block m-3" width="1268px" height="500" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 {{-- in --}}
<div class="container-fluid"> 
   <div class="container">
      <div class="row">
        <h3>New</h3>
@foreach ($restaurants as $restaurant) 
      <div class="card mt-1 ms-1" style="width: 247px;">
   <div class="card-body">
      <a href="{{ route('restaurants' , ['id' => $restaurant->id]) }}">
      <h5 class="card-title">{{ $restaurant->title }}</h5>
      <img src="{{ asset('img/'.$restaurant->image) }}" height="150" width="200" alt="">
      </a>
      <p class="card-text">{{ $restaurant->address }}</p>
   </div>
     </div>
@endforeach
      </div>
      {{-- <div class="row">
         {{ $restaurants->links() }}
      </div> --}}
   </div>
</div>

{{-- 2 --}}
<div class="container-fluid"> 
  <div class="container">
     <div class="row">
       <h3>Best</h3>
@foreach ($bestRestaurants as $restaurant) 
     <div class="card mt-1 ms-1" style="width: 247px;">
  <div class="card-body">
     <a href="{{ route('restaurants' , ['id' => $restaurant->id]) }}">
     <h5 class="card-title">{{ $restaurant->title }}</h5>
     <img src="{{ asset('img/'.$restaurant->image) }}" height="150" width="200" alt="">
     </a>
     <p class="card-text">{{ $restaurant->address }}</p>
  </div>
    </div>
@endforeach
     </div>
  </div>
</div>

{{-- 3 --}}
<div class="container-fluid"> 
  <div class="container">
     <div class="row">
       <h3>Category</h3>
@foreach ($categories as $category) 
     <div class="card mt-1 ms-1" style="width: 247px;">
  <div class="card-body">
     <a href="#">
     <h5 class="card-title">{{ $category->name }}</h5>
  </div>
    </div>
@endforeach
     </div>
  </div>
</div>

{{-- 4 --}}
<div class="container-fluid"> 
  <div class="container">
     <div class="row">
        <h3>Users</h3>
          <div class="card mt-1 ms-1" style="width: 247px;">
            <p>{{ $userCount }}</p>
          </div>
      </div>
    </div>
 </div>
@endsection