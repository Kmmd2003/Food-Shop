@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action={{ route('restaurant-insert') }} method="post" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              @error('name')
                  <span class="bg-red">Invalid name</span>
              @enderror
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <input name="is_slide" id="slide" value="1" placeholder="ddd" type="checkbox">
              <label class="ml-2" for="slide">Is Slide ?</label>
          </div>
            <div class="form-group">
              <label >Address</label>
              @error('address')
                  <span class="bg-red">Invalid Address</span>
              @enderror
              <textarea class="form-control" name="address" rows="3" placeholder="Your Address"></textarea>
            </div>
            <div class="form-group">
              <label >Description</label>
              @error('description')
                  <span class="bg-red">Invalid Description</span>
              @enderror
              <textarea class="form-control" id="tiny" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              @error('image')
                  <span class="bg-red">Invalid Image</span>
              @enderror
              <input type="file" class="form-control" name="image" id="image" placeholder="Image">
            </div>
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
        <!-- /.card -->
      </div>
    </div>
  </div>@endsection