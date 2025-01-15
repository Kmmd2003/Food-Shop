@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action={{ route('product-update') }} method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="hidden" name="id" id="id" value="{{ $product->id }}" >
              <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" value="{{ $product->price }}" name="price" id="price" placeholder="Enter price">
            </div>
            <div class="form-group">
                    <label>Restaurant</label>
                    <select name="restaurant" class="form-control">
                     @foreach ($restaurants as $restaurant)
                     @if ($restaurant->id == $product->restaurant_id)
                      <option selected value={{ $restaurant->id }}>{{ $restaurant->title }}</option>
                     @else
                      <option value={{ $restaurant->id }}>{{ $restaurant->title }}</option>
                     @endif
                     <option value={{ $restaurant->id }}>{{ $restaurant->title }}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category)
                        @if ($category->id == $product->category_id) 
                          <option selected value={{ $category->id }}>{{ $category->name }}</option>
                        @else
                          <option value={{ $category->id }}>{{ $category->name }}</option>                            
                        @endif
                        @endforeach
                    </select>
                  </div>
          </div>
          
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <!-- /.card -->
      </div>
    </div>
  </div>
@endsection