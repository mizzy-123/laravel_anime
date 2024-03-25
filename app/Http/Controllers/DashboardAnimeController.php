<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Genre;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DashboardAnimeController extends Controller
{

    public function index()
    {
        return view('dashboard.pages.dashboard', [
            'type_menu' => '',
            'post' => Post::latest()->paginate(6),
            'comment' => Comment::latest()->paginate(10)
        ]);
    }

    public function comment()
    {
        return view('dashboard.pages.comment', [
            'type_menu' => '',
            'comment' => Comment::latest()->paginate(20)
        ]);
    }
    public function formTambah()
    {
        $genre = Genre::all();
        $category = Category::all();
        return view('dashboard.pages.tambah-anime', [
            'type_menu' => 'forms',
            'genre' => $genre,
            'category' => $category
        ]);
    }

    public function edit(Post $post)
    {
        $genre = Genre::all();
        $category = Category::all();
        return view('dashboard.pages.edit-anime', [
            'type_menu' => 'dashboard',
            'anime' => $post,
            'genre' => $genre,
            'category' => $category
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($post->id)->where(function ($query) use ($post) {
                    return $query->where('slug', '!=', $post->slug);
                }),
            ],
            'jum_episodes' => 'required|integer',
            'durasi' => 'required',
            'category_id' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'image|file',
            'gambarV' => 'image|file',
            'link' => 'required|url'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->sinopsis), 200);

        if ($request->file('gambar')) {
            if ($post->gambar != null) {
                Storage::delete($post->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-anime');
        }

        if ($request->file('gambarV')) {
            if ($post->gambarV != null) {
                Storage::delete($post->gambarV);
            }
            $validatedData['gambarV'] = $request->file('gambarV')->store('gambar-anime');
        }

        $post->update($validatedData);
        $post->genre()->sync($request->genre);

        return redirect('/dashboard')->with('success', 'anime has been updated');
    }

    public function delete(Post $post)
    {
        if ($post->gambar != null) {
            Storage::delete($post->gambar);
        }

        if ($post->gambarV != null) {
            Storage::delete($post->gambarV);
        }
        $post->delete();
        return redirect('/dashboard')->with('success', 'Delete anime Successfull!!');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'jum_episodes' => 'required|integer',
            'durasi' => 'required',
            'category_id' => 'required',
            'sinopsis' => 'required',
            'gambar' => 'image|file',
            'gambarV' => 'image|file',
            'link' => 'required|url'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->sinopsis), 200);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-anime');
        }

        if ($request->file('gambarV')) {
            $validatedData['gambarV'] = $request->file('gambarV')->store('gambar-anime');
        }

        $cek = Post::create($validatedData);
        if ($cek) {
            $cek->genre()->sync($request->genre);
            $new = new PostView;
            $cek->views()->save($new);
        }

        return redirect('/dashboard')->with('success', 'New anime has been added');
    }

    public function view(Post $post)
    {
        $side = Post::inRandomOrder()
            ->whereNotIn('id', [$post->id])
            ->take(5)
            ->get();
        return view('main.pages.detail', [
            'post' => $post,
            'side' => $side
        ]);
    }
}
