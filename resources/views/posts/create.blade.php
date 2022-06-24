@extends('layouts.app')


@section('content')
<div class="container">
    <form action="/p" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Add new post</h2>
        <div class="row mb-3">
            <label for="caption" class="col-md-4 col-form-label text-md-end">Post caption</label>
        
            <div class="col-md-6">
                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>
        
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            
        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">Post image</label>
        
            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"  required  autofocus>
        
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-primary mt-4">Add post</button>
            </div>
        </div>
    </form>
</div>

@endsection