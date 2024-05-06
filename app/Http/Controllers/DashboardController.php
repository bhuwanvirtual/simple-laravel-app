<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $numberOfRooms        = Room::count();
        $numberOfReservations = Reservation::count();
        $numberOfUsers        = User::count();

        return view('dashboard', compact( 'numberOfRooms', 'numberOfReservations', 'numberOfUsers' ) );
    }
}
