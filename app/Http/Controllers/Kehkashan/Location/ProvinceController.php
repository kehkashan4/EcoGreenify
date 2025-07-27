<?php

namespace App\Http\Controllers\Kehkashan\Location;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index(){

    $provinces=Province::get();
    return view('Kehkashan.LocationAdmin.provinceshow',compact('provinces'));
  }
    public function create(){

    $province=new Province();
    return view('Kehkashan.LocationAdmin.provinceform',compact('province'));
  }
    public function store(Request $request){

    $request->validate([
        'name' => 'required|string|max:255|unique:provinces,name'
    ]);

    $data=$request->all();
    Province::create($data);
    return redirect()->route('admin.province.index')->with('success', 'Province created successfully.');
  }
    public function edit($id){

    $province=Province::find($id);
    return view('Kehkashan.LocationAdmin.provinceform',compact('province'));
  }
    public function update(Request $request,$id){

     $request->validate([
            'name' => 'required|string|max:255|unique:provinces,name,' . $id,
        ]);

    $province=Province::find($id);
    $data=$request->all();
    $province->update($data);
    return redirect()->route('admin.province.index')->with('success', 'Province updated successfully.');
  }
    public function delete($id){

    $province=Province::find($id);
    $province->delete();
    return redirect()->route('admin.province.index')->with('success', 'Province deleted successfully!');
  }
}
