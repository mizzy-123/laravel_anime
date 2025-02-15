<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create($validatedData);
        return redirect('/tambah-category')->with('success', 'New category has been added');
    }
}
