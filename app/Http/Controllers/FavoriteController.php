<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
{
    if (!Auth::check()) {
        return response()->json(['status' => 'error', 'message' => 'User not logged in']);
    }

    $request->validate([
        'marker_id' => 'required|exists:markers,id'
    ]);

    $userId = Auth::id();
    $markerId = $request->marker_id;

    // Check if already liked
    $favorite = Favorite::where('user_id', $userId)->where('marker_id', $markerId)->first();

    if ($favorite) {
        // If exists, remove from favorites
        $favorite->delete();
        return response()->json(['status' => 'removed']);
    } else {
        // If not, add to favorites
        Favorite::create([
            'user_id' => $userId,
            'marker_id' => $markerId // yahan `marker_id` sahi hona chahiye
        ]);
        return response()->json(['status' => 'added']);
    }
}

public function show()
{
    $favorites=Favorite::with(['user', 'marker'])->get();
    return view('Kehkashan.favoritelist', compact('favorites'));
}

}
