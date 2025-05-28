<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: linear-gradient(135deg, #eeff00, #df6e0a);
        }
        .train-card {
            transition: transform 0.2s ease-in-out;
            border-left: 4px solid #007bff;
        }
        .train-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .ticket-badge {
            font-size: 0.75rem;
            margin: 2px;
        }
        .train-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border-radius: 8px 8px 0 0;
        }
        .status-available { color: #28a745; }
        .status-booked { color: #dc3545; }
        .status-pending { color: #ffc107; }
        .page-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header -->
    <div class="page-header py-4 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="display-6 mb-0"><i class="fas fa-train me-3 text-primary"></i>Train Ticket Booking System</h1>
                    <p class="text-muted mb-0">Manage your train bookings and view available tickets</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" onclick="window.location.href='{{ route('dashboard') }}'">
                        <i class="fas fa-plus me-2"></i>New Booking
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Total Trains</h6>
                                <h3 class="mb-0">{{ $totalTrains }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-train fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Available Tickets</h6>
                                <h3 class="mb-0">{{ $availableTickets }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-ticket-alt fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Booked Tickets</h6>
                                <h3 class="mb-0">{{ $bookedTickets }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-calendar-check fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trains List -->
        <div class="row">
            @foreach($trains as $train)
                <div class="col-lg-6 mb-4">
                    <div class="card train-card h-100">
                        <div class="train-header p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $train->train_name }}</h5>
                                    <small class="opacity-75">Train ID: {{ $train->train_id }}</small>
                                </div>
                                <div class="text-end">
                                    @if($train->status === 'Active')
                                        <span class="badge bg-light text-dark">Active</span>
                                    @elseif($train->status === 'Maintenance')
                                        <span class="badge bg-warning text-dark">Maintenance</span>
                                    @else
                                        <span class="badge bg-secondary text-dark">{{ $train->status }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                </div>
                                <div class="col-6">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">Departure</small>
                                    <div>{{ $train->departure }}</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Arrival</small>
                                    <div>{{ $train->arrival }}</div>
                                </div>
                            </div>
                            <h6 class="mb-2">Associated Tickets:</h6>
                            <div class="d-flex flex-wrap">
                                @forelse($train->tickets as $ticket)
                                    @php
                                        $badgeClass = match($ticket->status) {
                                            'Available' => 'bg-success',
                                            'Booked' => 'bg-danger',
                                            'Pending' => 'bg-warning',
                                            'Suspended' => 'bg-secondary',
                                            default => 'bg-light text-dark'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }} ticket-badge">
                                        {{ $ticket->code }} ({{ $ticket->status }})
                                    </span>
                                @empty
                                    <span class="text-muted">No tickets</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Legend -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Ticket Status Legend:</h6>
                        <div class="d-flex flex-wrap gap-3">
                            <div><span class="badge bg-success">Available</span> - Ready for booking</div>
                            <div><span class="badge bg-danger">Booked</span> - Already reserved</div>
                            <div><span class="badge bg-warning">Pending</span> - Payment processing</div>
                            <div><span class="badge bg-secondary">Suspended</span> - Train under maintenance</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>