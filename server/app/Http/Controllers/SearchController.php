<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\BookTuberCategory;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $book_tuber_category = $request->book_tuber_category;
        $category = $request->category;
        $search = $request->input('search');
        $query = Post::query();

        // 汚いから後でwhenに変える
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
            $posts = $query->get();
        }elseif(!empty($category&&$book_tuber_category)) {
            $posts = Post::whereHas('categories',function($query) use ($category) {
                $query->whereIn('category_id', $category);       
            })->WhereHas('book_tuber_categories', function ($query) use($book_tuber_category) {
                $query->whereIn('book_tuber_category_id',$book_tuber_category);
            })->get();
        }elseif(!empty($category)) {
            $posts = Post::whereHas('categories',function($query) use ($category) {
                $query->whereIn('category_id', $category);       
            })->get();
        }elseif(!empty($book_tuber_category)) {
            $posts = Post::whereHas('book_tuber_categories',function($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);       
            })->get();
        }else{
          $posts = Post::with('categories', 'user', 'likes')->orderBy('created_at', 'desc')->take(6)->get();
        }
        $categories = Category::all();
        $book_tuber_categories = BookTuberCategory::all();


        return view('search.index', [
            'posts' =>  $posts,
            'title' => 'search',
            'search' => $search,
            'categories' => $categories,
            'book_tuber_categories' => $book_tuber_categories,
        ]);
    }
}
