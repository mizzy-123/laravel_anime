<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class DashboardGenreController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.genres', [
            'type_menu' => 'dashboard',
            'genres' => Genre::latest()->paginate(10)
        ]);
    }

    public function edit(Genre $genre)
    {
        return view('dashboard.pages.edit-genre', [
            'type_menu' => 'dashboard',
            'genre' => $genre
        ]);
    }

    public function update(Genre $genre, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $genre->update($validated);
        return back()->with('success', 'Update success');
    }

    public function delete(Genre $genre)
    {
        $genre->delete();
        return back()->with('success', 'Delete success');
    }
}
