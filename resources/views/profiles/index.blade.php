@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-2 my-2 mx-5">
            <img src="https://media-exp1.licdn.com/dms/image/C4E0BAQH2ziZFcJBC_g/company-logo_200_200/0?e=1596067200&v=beta&t=Tuz1346sIaFvCUdzcSXGSFNcYlIE1T9eKLvhMDHUFVw"
                alt="" class="rounded-circle" style="width:80px;height:80px">
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>

                @can('update', $user->profile)
                <a href="{{ route('p.create') }}">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profile)
            <a href="{{ route('profile.edit' , ['user' => $user->id]) }}">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="mr-4"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="mr-4"><strong>23k</strong> followers</div>
                <div class="mr-4"><strong>212</strong> following</div>
            </div>
            <div class="mt-2 font-weight-bold">{{ $user->profile->title ?? '' }}</div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#">{{ $user->profile->url ?? '' }}</a></div>
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