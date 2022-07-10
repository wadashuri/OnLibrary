<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class CategoryController extends Controller
{

    //未ログイン時はログインさせない
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $likes = new Like;
        $posts = Post::withCount('likes')->with('categories','user','likes')->get();

        return view('categorys.index', [
            'posts' =>  $posts,
            'likes' => $likes,
        ]);
    }
}
