@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center;">My Tasks</h3>
    <div class="row justify-content-center"  style="background: #023;margin-bottom: 30px">
        <div class="">
            <div class="cards">
                @forelse($tasks as $task)
                <div class="card" style="width: 12rem; float: left;margin: 10px">
                    <span class="task_status">{{ $task->status }}</span>
                    <img class="card-img-top" src="{{asset('/images/'.$task->image)}}" style="height: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$task->title}}</h5>
                        <p class="card-text">{{ $task->text }}</p>
                        <a href="{{route('edit',$task->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('destroy',$task->id)}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                @empty
                    <h3 style="color:white">Not Task</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>





<div class="container">
    <h3 style="text-align: center;">Attached Tasks</h3>
    <div class="row justify-content-center" style="background: #023;">
        <div class="">
            <div class="cards">
                @forelse($attachedtasks as $task)
                    <div class="card" style="width: 12rem; float: left;margin: 10px">
                        <span class="task_status">{{ $task->status }}</span>
                        <img class="card-img-top" src="{{asset('/images/'.$task->image)}}" style="height: 10rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$task->title}}</h5>
                            <p class="card-text">{{ $task->text }}</p>
                            <a href="{{route('edit',$task->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('destroy',$task->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @empty
                    <h3 style="color:white">Not Task</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
