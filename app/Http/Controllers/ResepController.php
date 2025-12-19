<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Category;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $query = Resep::with('category')->latest();

        if ($search) {
            $query->where('nama_resep', 'like', '%' . $search . '%');
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        $reseps = $query->paginate(9)->withQueryString();
        $categories = Category::all();

        return view('resep', compact('reseps', 'categories'));
    }
}
