@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Σχόλιο για την ανάρτηση: {{ $post->title }} (Απο: {{ $post->user->name }})
        </h1>
        <form action="" method="POST">
            @csrf
            <textarea name="comment" cols="30" rows="10" placeholder="Your text here" class="form-control"></textarea>
            <button class="btn btn-primary">COMMENT!</button>
        </form>
    </div>
@endsection