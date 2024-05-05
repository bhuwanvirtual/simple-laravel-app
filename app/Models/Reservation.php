<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room_id',
        'start_date',
        'end_date', 
        'guest_name', 
        'guest_email', 
        'guest_phone'
    ];

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
