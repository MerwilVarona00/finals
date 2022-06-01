@extends('layout')

@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">My Tasks</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('task.create') }}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> <b>Create Task</b>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    @foreach ($tasks as $task)
    <div class="card mt-3">
        <h5 class="card-header">
            @if ($task->status === "Todo")
                {{ $task->title }}
            @else
                <del>{{ $task->title }}</del>
            @endif

            <span class="badge rounded-pill bg-warning text-dark">
                {{ $task->created_at->diffForHumans() }}
            </span>
        </h5>

        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                    @if ($task->status === "Todo")
                {{ $task->description }}
            @else
                <del>{{ $task->description }}</del>
            @endif
            <br>
            
            @if ($task->status === "Todo")
                    <span class="badge rounded-pill bg-info text-dark">
                        Todo
                    </span>
                    @else
                    <span class="badge rounded-pill bg-success text-white">
                        Done
                    </span>
                    @endif


                    <small>Last Updated - {{ $task->updated_at->diffForHumans() }} </small>
                </div>
                <div class="float-end">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">
                        <i class=" fa fa-edit"></i> 
                    </a>

                    <form action="{{ route('task.destroy', $task->id) }}" style="display: inline" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            <i class=" fa fa-trash"></i> 
                        </button>
                    </form>
                </div>
                
                <div class="clearfix"></div>
            </div>
    
        </div>
    @endforeach 

    @if (count($tasks) === 0)
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Your Task list is empty. Time to recharge.</p>
        <hr>
    </div>
    @endif
    <img src="images/sleeping.png" class="koala"/>
    <style>
        .koala {
            background-repeat: no-repeat;
            position: absolute;
            width: 170px;
            height: 100px;
            top: 183px;
            right: 18%;
        }
    </style>
    <img src="images/mlogo.png" class="logo"/>
    <style>
        .logo {
            background-repeat: no-repeat;
            background-position: center left;
            background-size: cover;
            opacity: 0.6;
            position: absolute;
            width: 83px;
            height: 65px;
            top: 9px;
            left: 35px;
        }
    </style>
        
    
@endsection