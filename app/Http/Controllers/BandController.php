<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index(){
        $band = Band::orderBy('band_name')->get();
        return response()->json($band);
    }

    public function view(Band $band)
    {   
        $band->load('booking');
        return response()->json($band);
    }

    public function store(Request $request, Band $band)
    {
        $fields = $request->validate([
            'band_name' => 'string',
            'genre' => 'string',
            'year_started' => 'date',
            'membersCount' => 'numeric',
        ]);

        $band = Band::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'New band created with the ID#' .$band->id
        ]);
    }

    public function edit(Band $band)
    {
        return view('band.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $validatedData = $request->validate([
            'band_name' => 'string',
            'genre' => 'string',
            'year_started' => 'date',
            'membersCount' => 'numeric',
            
        ]);

        
        $band->update($validatedData);

        return response()->json([
            'status' => 'OK',
            'message' => 'Band with ID#' . $band->id . ' has been updated.'
        ]);
    }

    public function destroy(Band $band)
    {
        $band->delete();

        return response()->json([
            'status' => "OK",
            'messge' => 'Band with the band id of ' .$band->id . ' has been deleted'
        ]);
    }

    
}
