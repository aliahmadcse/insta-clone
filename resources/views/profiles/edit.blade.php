@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('profile.update',['user' => $user]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Profile title</label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="description" class="col-md-4 col-form-label">Profile description</label>

                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ old('description') ?? $user->profile->description }}">

                    @error('description')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="url" class="col-md-4 col-form-label">Profile URL</label>

                    <input type="text" class="form-control" id="url" name="url"
                        value="{{ old('url') ?? $user->profile->url }}">

                    @error('url')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mt-4">
                    <div class="custom-file">
                        <label class="custom-file-label" for="image">Profile Image...</label>

                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        @error('image')
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection