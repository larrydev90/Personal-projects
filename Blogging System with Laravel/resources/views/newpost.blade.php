@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title here" class="form-control">
            <textarea name="body" cols="30" rows="10" placeholder="Your text here" class="form-control"></textarea>
            <button class="btn btn-primary">POST!</button>
        </form>
    </div>
@endsection