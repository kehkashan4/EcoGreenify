<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Town;

class LocationController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        return view('Kehkashan.LocationAdmin.location', compact('provinces'));
    }

    public function getProvinces()
{
    $provinces = Province::all();
    return response()->json($provinces);
}


    public function getCities($province_id)
    {
        $cities = City::where('province_id', $province_id)->get();
        return response()->json($cities);
    }


    public function getTowns($city_id)
    {
        $towns = Town::where('city_id', $city_id)->get();
        return response()->json($towns);
    }
}
