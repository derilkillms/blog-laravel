<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    return view('auth.dashboard',['user'=>Auth::user()]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home', ['title'=>'Home Page']);
})->middleware('auth');

Route::get('/about', function () {
    return view('about',['nama'=>'Moh Deril Akbar Pranata','title'=>'About']);
});

Route::get('/posts', function () {


    return view('posts',['title'=>'Blog', 'posts'=>Post::filter(request(['search','category','author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {


        // $post = Post::find($slug);
        return view('post', ['title'=>'Single Post', 'post'=>$post]);
});


Route::get('/authors/{user:username}', function (User $user) {
// $posts = $user->posts->load('category','author');

    // $post = Post::find($slug);
    return view('posts', ['title'=> count($user->posts).' Article by '.$user->name, 'posts'=>$user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
// return $category->categories;
    // $posts = $category->categories->load('category','author');

    // $post = Post::find($slug);
    return view('posts', ['title'=>'In Category: '.$category->name, 'posts'=>$category->categories]);
});

Route::get('/contact', function () {
    return view('contact',['title'=>'Contact']);
});



