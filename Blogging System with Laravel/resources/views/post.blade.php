@extends('layouts.app')

@section('content')
<div class="blog_main">
    <div class="container">
        <div class="post">
            <h1>{{ $post->title }}</h1>
            <p>Από: {{ $post->user->name }} </p>
            <p>{{ $post->body }}</p>
            @if (Auth::check() && Auth::user()->id == $post->user->id)
                <a href="{{ route('post.edit', $post)}}"><button class="btn btn-primary">Edit post</button></a>
                <a href="{{ route('post.delete', $post)}}"><button class="btn btn-danger">Delete post</button></a>
            @endif
            <hr>
            <a href="{{ route('newcomment', $post)}}">Απάντηση</a>
        </div>
        Σχόλια: 
        @foreach ($post->comments as $comment)
            <p class="comment">
                <strong>{{ $comment->user->name }}: </strong>
                {{ $comment->comment }}
            </p>
        @endforeach
    </div>
</div>
@endsection
