<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        if (isset($_GET['action']) && $_GET['action'] == 'filter') {
            $startDate = $_GET['start_date'];
            $endDate   = $_GET['end_date'];

            // Get room IDs with reservations overlapping with the given date range
            $occupiedRoomIds = Reservation::where(function ($query) use ($startDate, $endDate) {
                $query->where('start_date', '<=', $endDate)
                    ->where('end_date', '>=', $startDate);
            })->pluck('room_id');

            // Get available rooms by excluding the occupied room IDs
            $rooms = Room::whereNotIn('id', $occupiedRoomIds)->get();

        } else {
            $rooms = Room::all();
        }
        
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'type' => 'required',
            'description' => 'nullable',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')
                         ->with('success','Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,'.$room->id,
            'type' => 'required',
            'description' => 'nullable',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')
                         ->with('success','Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
                         ->with('success','Room deleted successfully');
    }

    public function check(Request $request)
    {
        return view('rooms.check');
    }
}
