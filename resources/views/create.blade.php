@extends('layout')

@section('main-content')
  <div>
      <div class="float-start">
        <h4 class="pb-3">Create Task</h4>
      </div>
      <div class="clearfix"></div>
  </div> 
  <div class="card card-body bg-warning p-4">
    <form action="{{ route('task.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label"><b>Title</b></label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label"><b>Description</b></label>
        <textarea type="text" class="form-control" id="description" name="description" rows="10" placeholder="Enter Description"></textarea>
      </div>
      <div class="mb-3">
          <label for="description" class="form-label"><b>Status</b></label>
          <select name="status" id="status" class="form-control">
            @foreach ( $statuses as $status)
             <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
            @endforeach
          </select>
      </div>
      <a href="{{ route('index') }}" class="btn btn-danger mr-2"><i class="fa fa-arrow-left"></i><b> Cancel</b></a>
      <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i>
          <b>Save</b>
        </button>
    </form>
  </div>

    
@endsection