@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Showtimes for {{ $movie->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('showtimes.store', $movie->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="showtime">Showtime</label>
            <input type="datetime-local" class="form-control" id="showtime" name="showtime" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Showtime</button>
    </form>

    <h2>Existing Showtimes</h2>
    <ul>
        @foreach ($movie->showtimes as $showtime)
            <li>{{ $showtime->showtime }}</li>
        @endforeach
    </ul>
</div>
@endsection