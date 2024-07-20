<!DOCTYPE html>
<html>
<head>
    <title>Movie Ticket</title>
    <style>
       .container {
            width: 4in; /* Adjust this based on your ticket dimensions */
            height: 2in; /* Adjust this based on your ticket dimensions */
            text-align: center;
        }

        .details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>M.Raja Cinemas A/C </h2>
    <h1>{{ $booking->showtime->movie->title }} Ticket</h1>
    <!-- <img src="{{ $booking->showtime->movie->image }}" alt="{{ $booking->showtime->movie->title }}" class="movie-poster"> -->
    <p class="details">
        <strong>Showtime:</strong> {{ $booking->showtime->showtime }}<br>
        <strong>Name:</strong> {{ $booking->name }}<br>
        <strong>Seats:</strong> {{ $booking->seats }}
    </p>
</div>

</body>
</html>
