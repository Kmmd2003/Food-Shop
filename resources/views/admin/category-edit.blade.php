@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action={{ route('category-update') }} method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="hidden" name="id" id="id" value="{{ $category->id }}">
              <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label >Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Discription ...">{{ $category->description }}</textarea>
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