<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $query = Post::query();
        if(!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
                $posts = $query->get();
        }else{
            $posts = Post::with('categories','user','likes')->inRandomOrder()->get();
        }
        

        return view('search.index', [
            'posts' =>  $posts,
            'title' => 'search',
            'search' => $search,
        ]);
    }
}
