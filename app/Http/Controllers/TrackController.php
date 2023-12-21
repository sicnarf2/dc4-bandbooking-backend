<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function track() {
        $tracks = Track::orderBy('id')->get();
        return response()->json($tracks);
    }

    public function view(Track $track){
        $track->load('album');
        return response()->json($track);
    }

    
    // public function update(Request $request, Track $track) {
    //     $fields = $request->validate([
    //         'title' => 'string',
    //         'album_id' => 'exists:album,id',
    //         'duration' => 'required|numeric',
    //         'composer' => 'string',
    //         'track_number' => 'required|numeric'
    //     ]);

    //     $track->update($fields);

    //     return response()->json([
    //         'status' => "OK",
    //         'message' => 'Album with ID#' . $track->id . ' has been updated.'
    //     ]);
    // }

    public function update(Request $request, Track $track) {
        $fields = $request->validate([
            'title' => 'string',
            'album_id' => 'exists:albums,id',
            'duration' => 'required|numeric',
            'composer' => 'string',
            'track_number' => 'required|numeric'
        ]);
    
        $track->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Track with ID#' . $track->id . ' has been updated.'
        ]);
    }
    


    public function store(Request $request) {
        $fields = $request->validate([
            'title' => 'required|string',
            'album_id' => 'required|exists:albums,id',
            'duration' => 'required|numeric',
            'composer' => 'string',
            'track_number' => 'required|numeric'
        ]);
    
        $track = Track::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New track created with ID#' . $track->id 
        ]);
    }
    

    public function destroy(Track $track){
        $track->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Rent with the rent# ' .$track->id . ' has been deleted'
        ]);
    }
}
