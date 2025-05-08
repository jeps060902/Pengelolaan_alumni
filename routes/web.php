<?php

use App\Http\Controllers\AlumniController;
use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('Home', ['title' => 'Home Page']);
// });

Route::get('/', [AlumniController::class, 'index']);
Route::get('/Alumni', [AlumniController::class, 'Alumni'])->name('Alumni.Alumni');
Route::post('/tambah_alumni', [AlumniController::class, 'Tambah']);


// Route::get('/About', function () {
//     return view('About', ['title' => 'About', 'page' => 'About']);
// });
Route::get('/Posts', function () {
    $Post = Post::latest()->get();
    return view('Posts', ['title' => 'Blog', 'page' => 'Blog', 'posts' => $Post]);
});

// Route::get('/Posts/{post:slug}', function (post $post) {
//     // $post = Post::find($id);
//     return view('Post', ['title' => 'Single Post', 'post' => $post]);
// });
// Route::get('/author/{user:username}', function (User $user) {
//     return view('Posts', ['title' => count($user->posts) . ' Articles By : ' . $user->name, 'posts' => $user->posts]);
// });
// Route::get('/kategori/{kategori:slug}', function (Kategori $kategori) {
//     // $post = Post::find($id);
//     return view('Posts', ['title' => count($kategori->post) . ' Articles In : ' . $kategori->kategori, 'posts' => $kategori->post]);
// });

// Route::get('/Contact', function () {
//     return view('Contact', ['title' => 'Contact', 'page' => 'Contact']);
// });
