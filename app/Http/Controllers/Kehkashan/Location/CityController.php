<?php

namespace App\Http\Controllers\Kehkashan\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
    $cities=City::with('province')->paginate(5);
    return view('Kehkashan.LocationAdmin.cityshow',compact('cities'));
  }
    public function create(){

    $city = new City();
    $province = Province::get();
    return view('Kehkashan.LocationAdmin.cityform',compact('city','province'));
  }
    public function store(Request $request){

    $request->validate([
        'province_id' => 'required|exists:provinces,id',
        'name' => 'required|string|max:255|unique:cities,name'
    ]);

    $data=$request->all();
    City::create($data);
    return redirect()->route('admin.city.index')->with('success', 'City created successfully.');
  }
    public function edit($id){

    $city = City::find($id);
    $province=Province::all();
    return view('Kehkashan.LocationAdmin.cityform', compact('city','province'));
  }
    public function update(Request $request,$id){

    $request->validate([
        'province_id' => 'required|exists:provinces,id',
        'name' => 'required|string|max:255|unique:cities,name,' . $id,
    ]);

    $city=City::find($id);
    $data=$request->all();
    $city->update($data);
    return redirect()->route('admin.city.index')->with('success', 'City updated successfully.');
  }
    public function delete($id){

    $city=City::find($id);
    $city->delete();
    return redirect()->route('admin.city.index')->with('success', 'City deleted successfully!');

  }
}
