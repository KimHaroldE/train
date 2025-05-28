<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Fare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-warning text-center vh-100 d-flex align-items-center justify-content-center">
    <div class="container text-center bg-white p-4 rounded shadow-lg" style="max-width: 600px;">
        <div class="mb-4">
            <h1 class="fw-bold">Train Fare</h1>
            <p class="fst-italic">Train Ticket Reservation</p>
        </div>
        <div class="row g-3">
            <div class="col-6">
                <button class="btn btn-light w-100 py-3 shadow">Reserved Now</button>
            </div>
            <div class="col-6">
                <button class="btn btn-light w-100 py-3 shadow"><a href="{{url('/buy-tickets')}}">Buy Tickets</a></button>
            </div>
            <div class="col-6">
                <button class="btn btn-light w-100 py-3 shadow">Contact Us</button>
            </div>
            <div class="col-6">
                <button class="btn btn-light w-100 py-3 shadow">Train Schedules</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
