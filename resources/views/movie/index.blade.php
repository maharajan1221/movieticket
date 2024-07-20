@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/movie_image/' . $movie->image) }}" class="card-img-top" alt="{{ $movie->title }}" width="100" height="150">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="card-text">{{ $movie->description }}</p>
                    <a href="/movie/{{ $movie->id }}" class="btn btn-primary">View Showtimes</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection