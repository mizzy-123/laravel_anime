<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Genre;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function topPosts()
    {
        $topPosts = Post::with('views')->orderByDesc('views.views')->take(10)->get();

        return view('top-posts', compact('topPosts'));
    }

    public function show()
    {
        $newComment = Post::orderByDesc('last_comment_at')->take(5)->get();
        $side = Post::inRandomOrder()
            ->take(5)
            ->get();
        $topViews = Post::with('views')
            ->join('post_views', 'post_views.post_id', '=', 'posts.id')
            ->orderByDesc('post_views.views')
            ->take(10)
            ->get();
        return view('main.pages.show', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'genre']))->paginate(1)->withQueryString(),
            'side' => $side,
            'newComment' => $newComment,
            'topViews' => $topViews
        ]);
    }

    public function animeGenre()
    {
        $genres = Genre::all();
        return view('main.pages.anime-genre', [
            'genres' => $genres
        ]);
    }

    public function animeList()
    {
        $posts = Post::all();
        return view('main.pages.list-anime', [
            'posts' => $posts
        ]);
    }

    public function comment(Post $post, Request $request)
    {
        $c = new Comment;
        if (auth()->guest()) {
            $c->post_id = $post->id;
            $c->name = $request->name;
            $c->comment = $request->comment;
            $c->akses = 0;
            $c->save();

            $post->last_comment_at = Carbon::now();
            $post->save();

            return redirect('/show/detail/' . $post->slug);
        } else {
            $c->post_id = $post->id;
            $c->name = $request->name;
            $c->comment = $request->comment;
            $c->akses = 1;
            $c->save();

            $post->last_comment_at = Carbon::now();
            $post->save();

            return redirect('/show/detail/' . $post->slug);
        }
    }

    public function index()
    {
        $newComment = Post::orderByDesc('last_comment_at')->take(5)->get();
        $newPosts = Post::where('created_at', '>', Carbon::now()->subDays(6))->latest()->get();
        // $posts = Post::with('views')->orderByDesc('views.views')->take(10)->get();
        $posts = Post::latest()->take(6)->get();
        $carousel = Post::inRandomOrder()
            ->take(3)
            ->get();
        $topViews = Post::with('views')
            ->join('post_views', 'post_views.post_id', '=', 'posts.id')
            ->orderByDesc('post_views.views')
            ->take(10)
            ->get();


        return view('main.pages.home', [
            'newPosts' => $newPosts,
            'posts' => $posts,
            'topViews' => $topViews,
            'carousel' => $carousel,
            'newComment' => $newComment
        ]);
    }

    public function detail(Post $post)
    {
        // $post = Post::findOrFail($id);

        // Meningkatkan jumlah tampilan hanya jika belum dihitung untuk pengguna ini
        // if (!session()->has("post_{$id}_viewed")) {
        //     $post->views()->increment('views');
        //     session()->put("post_{$id}_viewed", true);
        // }

        $side = Post::inRandomOrder()
            ->whereNotIn('id', [$post->id])
            ->take(5)
            ->get();
        $post->views()->increment('views');
        return view('main.pages.detail', [
            'post' => $post,
            'side' => $side
        ]);
    }
}
