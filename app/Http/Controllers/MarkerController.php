<?php

namespace App\Http\Controllers;
use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MarkerController extends Controller
{
    public function index()
    {
        $markers = Marker::paginate(5);
        return view('Kehkashan.MarkerAdmin.markershow', compact('markers'));
    }

    public function show($slug)
    {
        $marker = Marker::where('slug', $slug)->firstOrFail();
        return view('Kehkashan.ecofriendlyplace', compact('marker'));
    }


    public function create()
    {
        $marker = new Marker();
        return view('Kehkashan.MarkerAdmin.markerform', compact('marker'));
    }

    public function store(Request $request)
    {

        $request->validate([
        'place_name' => 'required|string|max:150',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'circle_radius' => 'required|numeric',
        'description' => 'nullable|string',
        'address' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

        $data = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $dest = public_path('ecoimage/img');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($dest, $file_name);
            $data['image'] = '/ecoimage/img/' . $file_name;
        }

        $slug = Str::slug($request->place_name, '-'); // Pehla slug generate kiya
        $count = 1;

        // Check for Duplicate Slug
        while (Marker::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->place_name, '-') . '-' . $count;
            $count++;
        }

        $data['slug'] = $slug; // Final slug assign kiya


        Marker::create($data);
        return redirect()->route('admin.marker.index')->with('success', 'Marker added successfully!');
    }

    public function edit($slug)
    {
        // Find Marker by slug
        $marker = Marker::where('slug', $slug)->firstOrFail();
        return view('Kehkashan.MarkerAdmin.markerform', compact('marker'));
    }

    public function update(Request $request, $slug)
    {

        $request->validate([
        'place_name' => 'required|string|max:150',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'circle_radius' => 'required|numeric',
        'description' => 'nullable|string',
        'address' => 'required|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

        $marker = Marker::where('slug', $slug)->firstOrFail();
        $data = $request->all();


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $dest = public_path('ecoimage/img');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($dest, $file_name);
            $data['image'] = '/ecoimage/img/' . $file_name;
        }

        // Update slug if place_name changes
        if ($request->has('place_name') && $request->place_name !== $marker->place_name){
            $originalSlug = Str::slug($request->place_name, '-');
            $slug = $originalSlug;
            $count = 1;

            while (Marker::where('slug', $slug)->where('id', '!=', $marker->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug;
        }

        $marker->update($data);
        return redirect()->route('admin.marker.index')->with('success', 'Marker updated successfully!');
    }

    public function delete($id)
    {
        $marker = Marker::findOrFail($id);;
        $marker->delete();
        return redirect()->route('admin.marker.index')->with('success', 'Marker deleted successfully!');
    }
}
