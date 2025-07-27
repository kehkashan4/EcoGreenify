<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->q;

        if (strlen(trim($query)) < 1) {
            return response()->json([]);
        }

        $categories = Category::where('name', 'like', "%{$query}%")
            ->orderBy('name')
            ->limit(5)
            ->get()
            ->map(function ($category) {
                return [
                    'type' => 'category',
                    'name' => $category->name,
                    'slug' => $category->slug
                ];
            });

        $products = Product::where('name', 'like', "%{$query}%")
            ->orderBy('name')
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'type' => 'product',
                    'name' => $product->name,
                    'slug' => $product->slug
                ];
            });

        $results = $categories->merge($products)->take(10);

        return response()->json($results);
    }
}
