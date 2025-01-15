@foreach ($restaurants as $restaurant)   
<div class="row">
    <div class="card mt-1 ms-1" style="width: 11rem;">
 <div class="card-body">
    <a href="#">
    <h5 class="card-title">{{ $restaurant->title }}</h5>
    <img src="{{ asset('img/'.$restaurant->image.'.jpg') }}" height="150" width="125" alt="">
    </a>
    <p class="card-text">{{ $restaurant->address }}</p>
 </div>
   </div>
</div>
@endforeach
