<?php

namespace App\Http\Controllers\Kehkashan\Location;

use App\Http\Controllers\Controller;
use App\Models\Town;
use App\Models\City;
use App\Models\Province;

use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index(){

    $towns = Town::with('city.province')->paginate(5);
    return view('Kehkashan.LocationAdmin.townshow',compact('towns'));
  }

  public function getCities($province_id)
    {
        // Fetch cities based on province ID
        $cities = City::where('province_id', $province_id)->get();

        // Return cities as JSON
        return response()->json($cities);
    }

    public function create(){

    $town=new Town();
    $provinces=Province::get();
    $cities=City::get();
    return view('Kehkashan.LocationAdmin.townform',compact('town','cities','provinces'));
  }
    public function store(Request $request){

    $request->validate([
        'province_id' => 'required|exists:provinces,id',
        'city_id' => 'required|exists:cities,id',
        'name' => 'required|string|max:255|unique:towns,name',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $data=$request->all();
    Town::create($data);
    return redirect()->route('admin.town.index')->with('success', 'Town created successfully.');
  }
    public function edit($id){

    $town=Town::find($id);
    $provinces=Province::all();
    $cities=City::all();
    return view('Kehkashan.LocationAdmin.townform',compact('town','cities','provinces'));
  }
    public function update(Request $request,$id){

    $request->validate([
        'province_id' => 'required|exists:provinces,id',
        'city_id' => 'required|exists:cities,id',
        'name' => 'required|string|max:255|unique:towns,name,' . $id,
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $town=Town::find($id);
    $data=$request->all();
    $town->update($data);
    return redirect()->route('admin.town.index')->with('success', 'Town updated successfully.');
  }
    public function delete($id){

    $town=Town::find($id);
    $town->delete();
    return redirect()->route('admin.town.index')->with('success', 'Town deleted successfully!');
  }
}
