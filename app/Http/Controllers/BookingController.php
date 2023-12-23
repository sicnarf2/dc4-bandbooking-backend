<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(): JsonResponse
    {
        $bookings = Booking::with('band', 'user')->get();
        return response()->json($bookings);
    }


    public function view(Booking $booking){
        $booking->load('band', 'user');
        return response()->json($booking);
    }

    public function update(Request $request, Booking $booking) {
        $fields = $request->validate([
            'booking_date' => 'date',
        ]);
    
        $booking->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Booking with an ID# ' . $booking->id . ' has been updated.'
        ]);
    }
    
    public function store(Request $request) {
        $fields = $request->validate([
            'booking_date' => 'date',
        ]);
    
        $booking = Booking::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New booking created with ID# ' . $booking->id . '.'
        ]);
    }
    

    public function destroy(Booking $booking){
        $booking->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'With the booking# ' .$booking->id . ' has been deleted'
        ]);
    }
}
