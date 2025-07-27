<?php

namespace App\Http\Controllers;

use App\Models\slider;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('Kehkashan.SliderAdmin.slidershow', compact('sliders'));
    }

    public function create()
    {
        $slider = new Slider();
        return view('Kehkashan.SliderAdmin.sliderform', compact('slider'));
    }

    public function store(Request $request){

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

        Slider::create($data);
        return redirect()->route('admin.slider.index')->with('success', 'Slider added successfully!');
      }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('Kehkashan.SliderAdmin.sliderform', compact('slider'));
    }

    public function update(Request $request,$id){

        $slider=Slider::find($id);

        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data=$request->all();

        if($request->hasFile('img')){
          $file=$request->file('img');
          $dest=public_path('ecoimage/img');
          $file_name=time().'_'.$file->getClientOriginalName();
          $file->move($dest,$file_name);
          $data['image']='/ecoimage/img/'.$file_name;
      }

        $slider->update($data);
        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully!');
      }



    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully!');
    }
}
