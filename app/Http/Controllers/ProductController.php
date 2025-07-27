<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::with('category')->paginate(5);
        return view('Kehkashan.MartAdmin.productshow',compact('products'));
      }

      public function show($slug)
      {
          $product = Product::where('slug', $slug)->firstOrFail();
          return view('Kehkashan.product', compact('product'));
      }


        public function create(){

        $product = new Product();
        $category = Category::get();
        return view('Kehkashan.MartAdmin.productform',compact('product','category'));
      }
        public function store(Request $request){

        $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'is_available' => 'required|in:instock,outofstock',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        $data=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $dest=public_path('ecoimage/img');
            $file_name=time().'_'.$file->getClientOriginalName();
            $file->move($dest,$file_name);
            $data['image']='/ecoimage/img/'.$file_name;
        }

        // Pehla slug create kiya hai
        $slug = Str::slug($request->name, '-');
        $count = 1;

        // Check for Duplicate Slug
        while (Product::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->name, '-') . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug; // Final slug assign kiya


        Product::create($data);
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully!');
      }
        public function edit($slug){

        $product = Product::where('slug', $slug)->firstOrFail();
        $category=Category::all();
        return view('Kehkashan.MartAdmin.productform', compact('product','category'));
      }
        public function update(Request $request,$slug){

        $product=Product::where('slug', $slug)->firstOrFail();

        $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'stock_quantity' => 'required|integer|min:0',
        'is_available' => 'required|in:instock,outofstock',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        if ($request->has('name') && $request->name !== $product->name){
            $originalSlug = Str::slug($request->name, '-');
            $slug = $originalSlug;
            $count = 1;

            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        }

        $product->update($data);
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }
        public function delete($id){

        $product=Product::findOrFail($id);;
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');

      }
}
