@extends('layouts.app')

@section('content')
    <!-- Blog Start -->
    <div class="blog_main">
    	<div class="container">
            <div class="row">
                @if (Auth::check())
                    <a href="{{ route('newpost') }}">Νέα αναρτηση</a>
                @endif
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="blog_text">Αναρτήσεις</h1>
    			</div>
            </div>
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search') }}">
            <div class="row">
                <div class="col-sm-8">
                    <input class="form-control mr-sm-2" type="search" placeholder="Αναζήτηση" aria-label="Search" name="q">
                </div>
                <div class="col-sm-4">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div>
            </div>
        </form>
    	    <div class="blog_section_2">
                <div class="row">
                @foreach ($posts as $post)
                    <div class="col-sm-4">
                        <div class="section_1">
                            <div><img src="images/code.jpg" style="max-width: 100%;"></div>
                            <button type="button" class="date-bt">{{ date('d-m-Y', strtotime($post->created_at)) }}</button>
                            <p>
                                <h2>
                                    <a href="{{ route('post', $post)}}">{{ $post->title }}</a>
                                </h2>
                                <p>Από: {{ $post->user->name }}</p>
                                {{ $post->body }}
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
    	    </div>

       	</div>
    </div> 

    <!--blog end -->
@endsection
