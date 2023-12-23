<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user() {
        $user = User::orderBy('id')->get();
        return response()->json($user);
    }

    public function view(User $user){
        $user->load('order');
        return response()->json($user);
    }

    public function update(Request $request, User $user) {
        $fields = $request->validate([
            'name' => 'string',
            'email' => 'email',
        ]);
    
        $user->update($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Vehicle with ID# ' . $user->id . ' has been updated.'
        ]);
    }
    


    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'string',
            'email' => 'email',
        ]);
    
        $user = User::create($fields);
    
        return response()->json([
            'status' => 'OK',
            'message' => 'New vehicle created with ID# ' . $user->id 
        ]);
    }
    

    public function destroy(User $user){
        $user->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Vehicle with the ID# ' .$user->id . ' has been deleted'
        ]);
    }
}
