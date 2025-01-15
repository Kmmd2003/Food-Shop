@extends('layout.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href={{ route('category-create') }} class="col-1 btn btn-block btn-warning ">Create</a>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tfoot>
            <tbody>
            @foreach ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td><a href="{{ route('category-edit' , ['id' => $category->id]) }}">Edit</a></td>
            <td><a href="{{ route('category-delete' , ['id' => $category->id]) }}">Delete</a></td>
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