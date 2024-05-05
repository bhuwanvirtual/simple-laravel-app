<?php

namespace App\Http\Controllers;

use App\Models\Room;

class DashboardController extends Controller
{
    public function index() {
        $numberOfRooms = Room::count();

        return view('dashboard', compact( 'numberOfRooms' ) );
    }
}
