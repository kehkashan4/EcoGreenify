<?php

namespace App\Http\Controllers;
use App\Models\FeatureCard;
use App\Models\Marker;
use Illuminate\Http\Request;

class FeatureCardController extends Controller
{
    public function show(){

        $featurecards=FeatureCard::get();
        $markers=Marker::limit(8)->get();
        return view('Kehkashan.welcome',compact('featurecards','markers'));
    }
    public function index(){

        $featurecards=FeatureCard::get();
        return view('Kehkashan.FeatureCardAdmin.cardshow',compact('featurecards'));
      }
        public function create(){

        $featurecard=new FeatureCard();
        return view('Kehkashan.FeatureCardAdmin.cardform',compact('featurecard'));
      }
        public function store(Request $request){

        $request->validate([
        'title' => 'required|string|max:80',
        'tag_line' => 'required|string|max:150',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // max:2MB
    ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

        FeatureCard::create($data);
        return redirect()->route('admin.featurecard.index')->with('success', 'Feature Card added successfully!');
      }
        public function edit($id){

        $featurecard=FeatureCard::find($id);
        return view('Kehkashan.FeatureCardAdmin.cardform',compact('featurecard'));
      }
        public function update(Request $request,$id){

        $request->validate([
        'title' => 'required|string|max:80',
        'tag_line' => 'required|string|max:150',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

        $featurecard=FeatureCard::find($id);
        $data=$request->all();

        if($request->hasFile('img')){
          $file=$request->file('img');
          $dest=public_path('ecoimage/img');
          $file_name=time().'_'.$file->getClientOriginalName();
          $file->move($dest,$file_name);
          $data['image']='/ecoimage/img/'.$file_name;
      }

        $featurecard->update($data);
        return redirect()->route('admin.featurecard.index')->with('success', 'Feature Card updated successfully!');
      }
        public function delete($id){

        $featurecard=FeatureCard::find($id);
        $featurecard->delete();
        return redirect()->route('admin.featurecard.index')->with('success', 'Feature Card deleted successfully!');
      }
}
