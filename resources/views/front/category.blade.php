@extends('layout.home')
@section('content')
<div class="container">
    <div class="row">
       <h1>{{ $category->name }}</h1>
        @foreach ($category->products() as $product)
            <div class="mt-3 col-md-4 col-sm-6">
               <div class="card mb-30">
                <a class="card-img-titles" data-abc="true" href="#"></a>
                  <div class="card-body text-center">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="text-muted">{{ $product->price }}خرید ریال</p>
                    <a class="btn btn-outline-primary btn-sm" href="#">View Products</a>
                  </div>
               </div>
            </div>
        @endforeach
    </div>
</div>
@endsection