@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-3 p-5 ">
            <img src="{{ $user->profile->image != null ? '/storage/' . $user->profile->image  : 'https://cdn130.picsart.com/344993131001211.png?to=crop&type=webp&r=-1x-1&q=85'}}" alt="error" class="rounded-circle" width="150" height="150">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between">
                <h1>{{ $user->username}}</h1>
                @can('update', $user->profile)
                    <a href="/post/create">Add a new post</a>
                @endcan
            </div>
            <div class="d-flex align-items-center">
            <div class="pe-4"><strong>{{$user->posts->count()}}</strong> Posts</div>
            <div class="pe-4"><strong>{{$user->profile->followers->count()}}</strong> Followers</div>
            <div class="pe-4"><strong>{{$user->following->count()}}</strong> Following</div>
            <?php if (!(app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile))): ?>
            <follow-button user-id='{{$user->id}}' follows={{$follows}}></follow-button>
            <?php endif; ?>
            </div>
            @can('update', $user->profile)
                <div class="mt-4"><a href="/profile/{{$user->id}}/edit">Edit profile</a></div>
            @endcan
            <div class="pt-4 font-style-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center  ">
        @foreach ($user->posts as $post)
            <div class="col-4 m-3  " style="width:250px; height:250px ">
                <a href="/p/{{$post->id}}"><img src="/storage/{{ $post['image']}}" alt="" width="250" height="250"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection
