@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href={{ route('restaurant-create') }} class="col-1 btn btn-block btn-warning ">Create</a>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tfoot>
            <tbody>
              @foreach ($restaurants as $restaurant)     
              <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->address }}</td>
            <td><img height="50" width="100" src={{ asset('img/'.$restaurant->image) }} alt=""></td>
            <td><a href="{{ route('restaurant-edit' , ['id' => $restaurant->id]) }}">Edit</a></td>
            <td><a href="{{ route('restaurant-delete' , ['id' => $restaurant->id]) }}">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection