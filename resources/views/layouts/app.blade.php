<!DOCTYPE html>
<html>
<head>
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Movie Ticket Booking</a>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $('#bookModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var showtimeId = button.data('showtime');
            var modal = $(this);
            modal.find('#showtime_id').val(showtimeId);
        });
    </script>
</body>
</html>
