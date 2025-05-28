<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\Ticket;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::with('tickets')->get();

        $totalTrains = $trains->count();
        $availableTickets = $trains->flatMap->tickets->where('status', 'Available')->count();
        $bookedTickets = $trains->flatMap->tickets->where('status', 'Booked')->count();

        return view('trains', compact('trains', 'totalTrains', 'availableTickets', 'bookedTickets'));
    }

   
}
