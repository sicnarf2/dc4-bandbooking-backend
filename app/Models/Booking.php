<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
    ];
    
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

    public static function list()
    {
        $bookings = Booking::orderByRaw('id')->get();
        $list = [];
        foreach ($bookings as $booking) {
            $list[$booking->id] = $booking->id;
        }

        return $list;
    }
}
