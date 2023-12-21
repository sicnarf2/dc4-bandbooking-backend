<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::orderBy('id')->get();
        return response()->json($albums);
    }

    public function view(Album $album){
        $album->load('artist');
        return response()->json($album);
    }

    // public function update(Request $request, Album $album) {
    //     $fields = $request->validate([
    //         'title' => 'string',
    //         'artist_id' => 'exists:artist,id',
    //         'release_date' => 'date',
    //         'genre' => 'string'
    //     ]);

    //     $album->update($fields);

    //     return response()->json([
    //         'status' => "OK",
    //         'message' => 'Album with ID#' . $album->id . ' has been updated.'
    //     ]);
    // }

    public function update(Request $request, Album $album) {
        $fields = $request->validate([
            'title' => 'string',
            'artist_id' => 'exists:artists,id',
            'release_date' => 'date',
            'genre' => 'string',
        ]);
    
        $album->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Album with ID#' . $album->id . ' has been updated.'
        ]);
    }
    

    // public function store(Request $request, Album $album) {
    //     $fields = $request->validate([
    //         'title' => 'string',
    //         'artist_id' => 'required|exists:artists,id',
    //         'release_date' => 'date',
    //         'genre' => 'string'
    //     ]);

    //     $album = Album::create($fields);

    //     return response()->json([
    //         'status' => "OK",
    //         'message' => 'New album  created with ID#' . $album->id 
    //     ]);
    // }

    public function store(Request $request) {
        $fields = $request->validate([
            'title' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
            'release_date' => 'date',
            'genre' => 'string'
        ]);
    
        $album = Album::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New album created with ID#' . $album->id 
        ]);
    }
    

    public function destroy(Album $album){
        $album->delete();

        return response()->json([
            'status' => "OK",
            'message' => ' with the album# ' .$album->id . ' has been deleted'
        ]);
    }



}
