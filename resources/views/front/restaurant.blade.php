@extends('layout.home')

@section('content')
    
    <h2 class="alert alert-primary">{{ $restaurant->title }}</h2>

    <div class="container">
        <div class="row">
            <img style="height: 400px" src="{{ asset('img/'.$restaurant->image) }}" alt="">
        </div>
        <div class="row">
            <p>{{ $restaurant->address }}</p>
            <div class="row">
                {!! $restaurant->description !!}
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="row">
                <a href="{{ route('restaurants' , ['id' => $restaurant->id]) }}">All</a>
                @foreach ($categories as $category)
                    <a href="{{ route('restaurants' , ['id' => $restaurant->id , 'category' => $category->id]) }}">{{ $category->name }}</a>
                @endforeach
            </div>
            @foreach ($products as $product)
                <div class="mt-3 col-md-4 col-sm-6">
                <div class="card mb-30">
                    <a class="card-img-titles" data-abc="true" href="#"></a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="text-muted">{{ $product->price }}خرید ریال</p>
                        @if (Auth::user())
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('basket.add' , [
                        'product_id' => $product->id ,
                        'restaurant_id' => $restaurant->id 
                        ]) }}">Add to basket</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @endsection
