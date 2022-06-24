@extends('layouts.app')


@section('content')
@foreach ($posts as $post)
    <div class="container">
        <div class="row">
            <div class="col-4 my-4">
                <img src="/storage/{{$post->image}}" alt="" width="250" height="250">
            </div>
            
            <div class="col-4 mt-4">
                <h3>{{$post->user->username}}</h3>
                <h3>{{$post->caption}}</h3>
            </div>
        </div>
    </div>
@endforeach
    <div class="row">
        <div class="col-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection