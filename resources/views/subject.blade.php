@extends('layout')
@section('content')

<div class="d-flex justify-content-between">
  <h1>Subject</h1>
<button data-bs-target="#createModal" data-bs-toggle="modal" class="btn btn-danger">Create</button>
</div>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th >Name</th>
      <th >Action</th>
    </tr>
  </thead>
  @foreach($datas as $key => $data)
  <tr>
    <td>{{$key+1}}</td>
    <td>{{$data->name}}</td>
    <td>
      <button class="btn" data-bs-toggle="modal" data-bs-target="#updateModal{{ $data->id }}"><i class="material-icons" style="color:red">edit</i></button>
      <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id}}"><i class="material-icons" style="color:red">delete</i></button>
    </td>
  </tr>
  @endforeach
</table>
<form method="post" action="{{url('subject/create')}}">
  @csrf @method("post")
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Add Subject</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <lable>Name :</lable>
          <input type="text" name="name">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i></button>
          <button type="submit" class="btn btn-primary "><i class="fa-solid fa-check"></i></button>
        </div>
      </div>
    </div>
  </div>
</form>
@foreach($datas as $data)
<div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Delete Subject </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{url('subject/delete/'.$data->id)}}">
        @csrf @method("GET")
        <div class="modal-body">
          Beneran mau di apus nih???

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i></button>
          <button type="submit" class="btn btn-primary "><i class="fa-solid fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@foreach($datas as $data)
<div class="modal fade" id="updateModal{{$data->id}}" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Update Subject </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{url('subject/update/'.$data->id)}}">
        @csrf @method("POST")
        <div class="modal-body">
          <lable>Name :</lable>
          <input type="text" name="name" value="{{ $data->name }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i></button>
          <button type="submit" class="btn btn-primary "><i class="fa-solid fa-check"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection