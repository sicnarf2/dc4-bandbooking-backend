<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::orderBy('id')->get();
        return response()->json($artists);
    }

    public function view(Artist $artist)
    {   
        $artist->load('album');
        return response()->json($artist);
    }

    public function store(Request $request, Artist $artist)
    {
        $fields = $request->validate([
            'artist_name' => 'required',
            'genre' => 'required',
            'origin' => 'required',
        ]);

        $artist = Artist::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'New artist created with the ID#' .$artist->id
        ]);
       

       
    }

    public function edit(Artist $artist)
    {
        return view('artist.edit', compact('artist'));
    }

    // public function update( Request $request, Artist $artist)
    // {
    //     $fields = $request->validate([
    //         'artist_name' => 'string',
    //         'genre' => 'string',
    //         'origin' => 'decimal',
    //     ]); 

    //     $artist->update($fields);

    //     return response()->json([
    //         'status' => 'OK',
    //         'message' => 'Artist with ID#' . $artist->id . ' has been updated.'
    //     ]);
       
    // }

    public function update(Request $request, Artist $artist)
    {
       
        $validatedData = $request->validate([
            'artist_name' => 'string',
            'genre' => 'string',
            'origin' => 'string',
            
        ]);

        
        $artist->update($validatedData);

        return response()->json([
            'status' => 'OK',
            'message' => 'Artist with ID#' . $artist->id . ' has been updated.'
        ]);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->json([
            'status' => "OK",
            'messge' => 'Artist with the artist#' .$artist->id . 'has been deleted'
        ]);
    }

    
}
