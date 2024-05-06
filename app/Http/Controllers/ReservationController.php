<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        if (isset($_GET['action']) && $_GET['action'] == 'filter') {
            $reservations = Reservation::where('guest_email', $_GET['guest_email'])
                    ->where('start_date', $_GET['start_date'])->get();

        } else {
            $reservations = Reservation::get();
        }
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::all();

        return view('reservations.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => [
                'required',
                'exists:rooms,id',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if the room is already reserved for the given date range
                    $isReserved = Reservation::where('room_id', $request->room_id)
                        ->where(function ($query) use ($request) {
                            $query->where('start_date', '<=', $request->end_date)
                                ->where('end_date', '>=', $request->start_date);
                        })
                        ->exists();
                    if ($isReserved) {
                        $fail('The selected room is already reserved for the given date range.');
                    }
                }
            ],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'guest_name' => 'required',
            'guest_email' => 'required|email',
            'guest_phone_number' => 'required',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
                         ->with('success','Reservation created successfully.');
    }

    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    public function check(Request $request)
    {
        return view('reservations.check');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
                         ->with('success','Reservation deleted successfully');    }
}
