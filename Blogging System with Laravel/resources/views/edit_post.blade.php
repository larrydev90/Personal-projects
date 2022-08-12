@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit post</h1>
        <form action="" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title here" class="form-control" value="{{ $post->title }}">
            <textarea name="body" cols="30" rows="10" placeholder="Your text here" class="form-control">{{ $post->body }}</textarea>
            <button class="btn btn-primary">POST!</button>
        </form>
    </div>
@endsection