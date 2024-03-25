<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardAnimeController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardGenreController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/', '/dashboard');
Route::get('/', [PostController::class, 'index']);

Route::get('/show/detail/{post:slug}', [PostController::class, 'detail']);

Route::get('/top-posts', [PostController::class, 'topPosts'])->name('top-posts');

Route::post('/comment/{post:slug}', [PostController::class, 'comment']);

Route::get('/anime-list', [PostController::class, 'animeList']);

Route::get('/anime-genre', [PostController::class, 'animeGenre']);

Route::get('/show', [PostController::class, 'show']);


Route::middleware('auth')->group(function () {
    // Dashboard

    Route::get('/category', [DashboardCategoryController::class, 'index']);

    Route::get('/comment', [DashboardAnimeController::class, 'comment']);

    Route::get('/category/{category}', [DashboardCategoryController::class, 'edit']);

    Route::post('/category/{category}', [DashboardCategoryController::class, 'update']);

    Route::get('/delete-category/{category}', [DashboardCategoryController::class, 'delete']);

    Route::get('/genre', [DashboardGenreController::class, 'index']);

    Route::get('/genre/{genre}', [DashboardGenreController::class, 'edit']);

    Route::post('/genre/{genre}', [DashboardGenreController::class, 'update']);

    Route::get('/delete-genre/{genre}', [DashboardGenreController::class, 'delete']);

    Route::get('/comment/{comment}', [CommentController::class, 'delete']);

    Route::get('/dashboard', [DashboardAnimeController::class, 'index']);

    Route::get('/dashboard/{post:slug}', [DashboardAnimeController::class, 'view']);

    Route::get('/tambah-anime', [DashboardAnimeController::class, 'formTambah']);

    Route::post('/tambah-anime', [DashboardAnimeController::class, 'store']);

    Route::get('/edit-anime/{post:slug}', [DashboardAnimeController::class, 'edit']);

    Route::post('/edit-anime/{post:slug}', [DashboardAnimeController::class, 'update']);

    Route::get('/delete-anime/{post:slug}', [DashboardAnimeController::class, 'delete']);

    Route::get('/tambah-genre', function () {
        return view('dashboard.pages.tambah-genre', ['type_menu' => 'forms']);
    });

    Route::post('/tambah-genre', [GenreController::class, 'store']);

    Route::get('/tambah-category', function () {
        return view('dashboard.pages.tambah-category', ['type_menu' => 'forms']);
    });

    Route::post('/tambah-category', [CategoryController::class, 'store']);

    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});
