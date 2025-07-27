<?php

namespace App\Http\Controllers;
use App\Models\Marker;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class EcoFriendlyPlaceController extends Controller
{

    public function searchMarkers($town_id)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $town = Town::find($town_id);
        if (!$town) {
            return response()->json(['error' => 'Town not found'], 404);
        }

        // Find nearest 3 eco-friendly places using Haversine formula
        $markers = Marker::select(
            "id", "place_name", "latitude", "longitude",
            DB::raw("(
                6371 * acos(
                    cos(radians($town->latitude)) * cos(radians(latitude)) *
                    cos(radians(longitude) - radians($town->longitude)) +
                    sin(radians($town->latitude)) * sin(radians(latitude))
                )
            ) AS distance")
        )
        ->orderBy('distance')
        ->take(3)
        ->get();

        return response()->json([
            'town_coordinates' => [
                'latitude' => $town->latitude,
                'longitude' => $town->longitude
            ],
            'markers' => $markers
        ]);
    }
}


