<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.categories', [
            'type_menu' => '',
            'categories' => Category::latest()->paginate(10)
        ]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.pages.edit-category', [
            'type_menu' => 'dashboard',
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category->update($validated);

        return back()->with('success', 'Update success');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Delete success');
    }
}
