@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-2 my-2 mx-5">
            <img src="{{ url($user->profile->profileImage()) }}" alt="" class="rounded-circle w-100" />
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h3">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows={{ $follows }}></follow-button>
                </div>
                @can('update', $user->profile)
                <a href="{{ route('p.create') }}">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
            <a href="{{ route('profile.edit' , ['user' => $user->id]) }}">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="mr-4"><strong>{{ $postCount }}</strong> posts</div>
                <div class="mr-4"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="mr-4"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="mt-2 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row mt-4">

        @foreach ($user->posts as $post)
        <div class="col-4 mb-4">
            <a href="{{ route('p.show',['post' => $post->id]) }}">
                <img src="{{ url('/storage/'.$post->image) }}" alt="" class="w-100">
            </a>
        </div>
        @endforeach

    </div>
</div>
@endsection