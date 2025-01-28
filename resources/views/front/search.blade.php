@extends('layout.home')

@section('content')
<div class="container-fluid"> 
    <div class="container">
       <div class="row">
        @if (count($restaurants) == 0)
                    <h2>no result found !</h2>
        @endif
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
    </div>
 </div>
 @endsection