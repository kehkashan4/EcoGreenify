<?php

namespace App\Http\Controllers\Kehkashan;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function issue(){
        $issues=Issue::get();
        return view("Kehkashan.issues", compact('issues'));
    }

    public function index(){

        $issues=Issue::get();
        return view('Kehkashan.IssueAdmin.issueshow',compact('issues'));
      }
        public function create(){

        $issue=new Issue();
        return view('Kehkashan.IssueAdmin.issueform',compact('issue'));
      }
        public function store(Request $request){

        $request->validate([
        'title' => 'required|string|max:100',
        'description' => 'required|string',
        'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

        Issue::create($data);
        return redirect()->route('admin.issue.index')->with('success', 'Environmental Issue created successfully!');
      }
        public function edit($id){

        $issue=Issue::find($id);
        return view('Kehkashan.IssueAdmin.issueform',compact('issue'));
      }
        public function update(Request $request,$id){

        $request->validate([
        'title' => 'required|string|max:100',
        'description' => 'required|string',
        'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

        $issue=Issue::find($id);
        $data=$request->all();

        if($request->hasFile('img')){
          $file=$request->file('img');
          $dest=public_path('ecoimage/img');
          $file_name=time().'_'.$file->getClientOriginalName();
          $file->move($dest,$file_name);
          $data['image']='/ecoimage/img/'.$file_name;
      }

        $issue->update($data);
        return redirect()->route('admin.issue.index')->with('success', 'Environmental Issue updated successfully!');
      }
        public function delete($id){

        $issue=Issue::find($id);
        $issue->delete();
        return redirect()->route('admin.issue.index')->with('success', 'Environmental Issue deleted successfully!');
      }
}
