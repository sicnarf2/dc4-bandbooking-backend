<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicle() {
        $vehicles = Vehicle::orderBy('id')->get();
        return response()->json($vehicles);
    }

    public function view(Vehicle $vehicle){
        $vehicle->load('order');
        return response()->json($vehicle);
    }

    public function update(Request $request, Vehicle $vehicle) {
        $fields = $request->validate([
            'make' => 'string',
            'model' => 'string',
            'year' => 'numeric',
            'color' => 'string',
            'transmission' => 'string',
            'price' => 'numeric'
        ]);
    
        $vehicle->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Vehicle with ID# ' . $vehicle->id . ' has been updated.'
        ]);
    }
    


    public function store(Request $request) {
        $fields = $request->validate([
            'make' => 'string',
            'model' => 'string',
            'year' => 'numeric',
            'color' => 'string',
            'transmission' => 'string',
            'price' => 'numeric'
        ]);
    
        $vehicle = Vehicle::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New vehicle created with ID# ' . $vehicle->id 
        ]);
    }
    

    public function destroy(Vehicle $vehicle){
        $vehicle->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Vehicle with the ID# ' .$vehicle->id . ' has been deleted'
        ]);
    }
}
