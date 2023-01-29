<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home', [
            'title' => 'Home',
            'posts' =>  Post::with('categories', 'user', 'likes')->orderBy('created_at', 'desc')->take(6)->get(),
            'order_likes' => Post::withCount('likes')->with('categories', 'user', 'likes')->orderBy('likes_count', 'desc')->take(5)->get()
        ]);
    }
}
