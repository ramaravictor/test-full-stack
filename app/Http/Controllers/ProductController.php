<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index(Request $request)
    // {
    //     $search = $request->input('search');
    //     $categoryId = $request->input('category_id');
    //     $query = Product::with('category')->latest();

    //     if ($search) {
    //         $query->where('name', 'like', '%' . $search . '%');
    //     }

    //     if ($categoryId) {
    //         $query->where('category_id', $categoryId);
    //     }
    //     $products = $query->paginate(9)->withQueryString();
    //     $categories = Category::all();

    //     return view('product', compact('products', 'categories'));
    // }
}
