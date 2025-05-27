@extends('layout')
@section('content')

<div class="d-flex justify-content-between">
    <h1>Tasks</h1>
    <button data-bs-target="#createModal" data-bs-toggle="modal" class="btn btn-danger">Create</button>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Started</th>
            <th>Deadline</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($datas as $key => $data)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->class->name}}</td>
        <td>{{$data->subject->name}}</td>
        <td>{{$data->started}}</td>
        <td>{{$data->deadline}}</td>
        <td>{{$data->description}}</td>
        <td>
            <button class="btn" data-bs-toggle="modal" data-bs-target="#updateModal{{ $data->id }}"><i class="material-icons" style="color:red">edit</i></button>
            <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id}}"><i class="material-icons" style="color:red">delete</i></button>
        </td>
    </tr>
    @endforeach
</table>
<form method="post" action="{{url('task/create')}}">
    @csrf @method("post")
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Add Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lable>Name :</lable>
                    <input type="text" name="name"> 
                    <br>
                    <lable>Class</lable>
                    <select name="classes_id" class="form-select" id="classes_id" required>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <lable>Subject</lable>
                    <select name="subjects_id" class="form-select" id="subjects_id" required>
                        @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <lable>Started :</lable>
                    <input type="date" name="started">
                    <br>
                    <br>

                    <lable>Deadline :</lable>
                    <input type="date" name="deadline">
                    <br>
                    <br>
                    <lable>Description :</lable>
                    <textarea name="description"></textarea>
                    <br>
                    <br>
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
                <h1 class="modal-title fs-5" id="createModalLabel">Delete Task </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('task/delete/'.$data->id)}}">
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
                <h1 class="modal-title fs-5" id="createModalLabel">Update Task </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('task/update/'.$data->id)}}">
                @csrf @method("POST")
                <div class="modal-body">
                    <lable>Name :</lable>
                    <input type="text" name="name" value="{{ $data->name }}">
                </div>
                <select name="classes_id" class="form-select" id="classes_id" required>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == $data->class_id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
                <select name="subject_id" class="form-select" id="subject_id" required>
                    @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $data->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                </select>
                <div class="modal-body">
                    <lable>Started :</lable>
                    <input type="date" name="started" value="{{ $data->started }}">
                </div>
                <div class="modal-body">
                    <lable>Deadline :</lable>
                    <input type="date" name="deadline" value="{{ $data->deadline }}">
                </div>
                <div class="modal-body">
                    <lable>Description :</lable>
                    <textarea name="description">{{$data->description}}</textarea>
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