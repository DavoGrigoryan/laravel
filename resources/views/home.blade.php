@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="cards">
                @foreach($posts as $post)
                <div class="card" style="width: 18rem; float: left;margin: 10px">
                    <img class="card-img-top" src="{{asset('/images/'.$post->image)}}" style="height: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{ $post->text }}</p>
                        <a href="{{route('edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('destroy',$post->id)}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
