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
        $posts = Post::with('categories', 'user', 'likes')->orderBy('created_at', 'desc')->take(6)->get();

        $likes = new Like;

        $order_likes = Post::withCount('likes')->with('categories', 'user', 'likes')->orderBy('likes_count', 'desc')->take(5)->get();

        return view('home', [
            'posts' =>  $posts,
            'likes' => $likes,
            'title' => 'Home',
            'order_likes' => $order_likes,
        ]);
    }
    

    //投稿追加機能
    public function ajaxaddpost(Request $request)
    {
        $offset = isset($_POST['post_num_now']) ? $_POST['post_num_now'] : 1;
        $posts_per_page = isset($_POST['post_num_add']) ? $_POST['post_num_add'] : 0;
        $posts = Post::offset($offset)->limit($posts_per_page)->orderBy('created_at', 'desc')->take(6)->get()->load('categories', 'user', 'likes');
        return view('ajaxaddpost', ['posts' =>  $posts,]);
    }
}
