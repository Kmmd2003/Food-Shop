@extends('layout.home')

@section('content')
    
    <h2 class="alert alert-primary">{{ $restaurant->title }}</h2>

    <div class="container">
        <div class="row">
            <img style="height: 400px" src="{{ asset('img/'.$restaurant->image) }}" alt="">
        </div>
        <div class="row">
            <p>{{ $restaurant->address }}</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 col-sm-6">
                <div class="card mb-30">
                    <a class="card-img-titles" data-abc="true" href="#"></a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="text-muted">{{ $product->price }}</p>
                        <a class="btn btn-outline-primary btn-sm" href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @endsection
