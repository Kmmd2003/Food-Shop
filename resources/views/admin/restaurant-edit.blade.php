@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action={{ route('restaurant-update') }} method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="hidden" name="id" id="id" value="{{ $restaurant->id }}">
              <input type="text" class="form-control" name="name" value="{{ $restaurant->title }}" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <input name="is_slide" id="slide" value="1" placeholder="ddd" type="checkbox" {{ $restaurant->is_slide == 1 ? 'checked' : '' }}>
              <label class="ml-2" for="slide">Is Slide ?</label>
          </div>
            <div class="form-group">
              <label >Address</label>
              <textarea class="form-control" name="address" rows="3" placeholder="Your Address">{{ $restaurant->address }}</textarea>
            </div>
            <div class="form-group">
              <label >Description</label>
              @error('description')
                  <span class="bg-red">Invalid Description</span>
              @enderror
              <textarea class="form-control" id="tiny" name="description" rows="3">{{ $restaurant->description }}</textarea>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image" placeholder="Image">
              <td><img height="50" width="100" src={{ asset('img/'.$restaurant->image) }} alt=""></td>
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <!-- /.card -->
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
      </div>
    </div>
  </div>@endsection