@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Movie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <div class="form-group">
            <label for="image">Movie Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection