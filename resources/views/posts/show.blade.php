@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ url('/storage/' . $post->image) }}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ url($post->user->profile->profileImage()) }}" class="w-100 rounded-circle" alt=""
                            style="max-width:50px">
                    </div>
                    <div class="font-weight-bold">

                        <a class="text-dark"
                            href="{{ url('/profile/'.$post->user->id) }}">{{ $post->user->username }}</a>
                        <a href="#" class="pl-3">Follow</a>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold pr-3">
                        <a class="text-dark" href="{{ url('/profile/'.$post->user->id) }}">{{ $post->user->username }}
                        </a>
                    </span>{{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection