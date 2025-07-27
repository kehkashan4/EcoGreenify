<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories=Category::get();
        return view('Kehkashan.MartAdmin.categoryshow',compact('categories'));
      }

      public function show($slug)
      {
          $category = Category::where('slug', $slug)->with('products')->firstOrFail();
          return view('Kehkashan.category', compact('category'));
      }

        public function create(){

        $category=new Category();
        return view('Kehkashan.MartAdmin.categoryform',compact('category'));
      }
        public function store(Request $request){

        $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

        $slug = Str::slug($request->name, '-'); // Pehla slug generate kiya
        $count = 1;

        // Check for Duplicate Slug
        while (Category::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug; // Final slug assign kiya

        Category::create($data);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
      }
        public function edit($slug){

        $category = Category::where('slug', $slug)->firstOrFail();
        return view('Kehkashan.MartAdmin.categoryform',compact('category'));
      }
        public function update(Request $request,$slug){

        $category = Category::where('slug', $slug)->firstOrFail();

        $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

         // Update slug if name changes
         if ($request->has('name') && $request->name !== $category->name){
            $originalSlug = Str::slug($request->name, '-');
            $slug = $originalSlug;
            $count = 1;

            while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        }

        $category->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');

    }
        public function delete($id){

        $category=Category::findOrFail($id);;
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
      }
}
