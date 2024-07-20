@extends('layouts.app')

@section('content')
<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        @if (session('download_link'))
            <a href="{{ session('download_link') }}" class="btn btn-primary">Download Your Ticket</a>
        @endif
    </div>
@endif

    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <h2>Showtimes</h2>
    <ul>
        @foreach($showtimes as $showtime)
        <li>{{ $showtime->showtime }} <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookModal" data-showtime="{{ $showtime->id }}">Book Now</a></li>
        @endforeach
    </ul>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookModalLabel">Book Tickets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/book" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="showtime_id" id="showtime_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Number of Seats</label>
                        <input type="number" class="form-control" id="seats" name="seats" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#bookModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var showtimeId = button.data('showtime'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-body #showtime_id').val(showtimeId);
    });
</script>
@endpush
