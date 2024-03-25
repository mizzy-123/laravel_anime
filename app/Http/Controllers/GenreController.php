<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:genres'
        ]);

        Genre::create($validatedData);
        return redirect('/tambah-genre')->with('success', 'New genre has been added');
    }
}
