<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\BookTuberCategory;

class SearchController extends Controller
{
    // 投稿追加機能
    public function searchAjaxAddPost(Request $request)
    {
        $offset = isset($_POST['post_num_now']) ? $_POST['post_num_now'] : 1;
        $posts_per_page = isset($_POST['post_num_add']) ? $_POST['post_num_add'] : 0;

        $book_tuber_category_string = $_POST['book_tuber_category_string'];
        if($book_tuber_category_string === ''){
            $book_tuber_category = null;
        }else{
            $book_tuber_category =  explode(",", $book_tuber_category_string);
        }

        $category_string = $_POST['category_string'];
        if($category_string === ''){
            $category = null;
        }else{
            $category =  explode(",", $category_string);
        }
        $search = isset($_POST['search']) ? $_POST['search']: null;


        // $search = $_POST['search'];
        $query = Post::query();

        // 汚いから後でwhenに変える
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
            $posts = $query->offset($offset)->limit($posts_per_page)->take(6)->get();
        } elseif (!empty($category && $book_tuber_category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->WhereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->offset($offset)->limit($posts_per_page)->take(6)->get();
        } elseif (!empty($category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->offset($offset)->limit($posts_per_page)->take(6)->get();
        } elseif (!empty($book_tuber_category)) {
            $posts = Post::whereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->offset($offset)->limit($posts_per_page)->take(6)->get();
        } else {
            $posts = Post::with('categories', 'user', 'likes')->offset($offset)->limit($posts_per_page)->orderBy('created_at', 'desc')->take(6)->get();
        }
        $categories = Category::all();
        $book_tuber_categories = BookTuberCategory::all();
        return view('searchAjaxAddPost', [
            'posts' =>  $posts,
            'title' => 'search',
            'search' => $search,
            'categories' => $categories,
            'book_tuber_categories' => $book_tuber_categories,
        ]);
    }

    
    public function index(Request $request)
    {
        $book_tuber_category = $request->book_tuber_category;
        $category = $request->category;
        $search = $request->input('search');
        $category_string = null;
        $book_tuber_category_string = null;
        //配列を文字列に変換
        if($category){
         $category_string = implode( ",", $category );
        }
        if($book_tuber_category){
            $book_tuber_category_string = implode( ",", $book_tuber_category );
        }
        $query = Post::query();

        // 汚いから後でwhenに変える
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
            $posts = $query->take(6)->get();
        } elseif (!empty($category && $book_tuber_category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->WhereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->take(6)->get();
        } elseif (!empty($category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->take(6)->get();
        } elseif (!empty($book_tuber_category)) {
            $posts = Post::whereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->take(6)->get();
        } else {
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
            'category_string' => $category_string,
            'book_tuber_category_string' => $book_tuber_category_string,
        ]);
    }

    public function result(Request $request)
    {
        $book_tuber_category = $request->book_tuber_category;
        $category = $request->category;
        $search = $request->input('search');
        $query = Post::query();

        //配列をJSに渡すために成形する
        $json_book_tuber_category = json_encode($book_tuber_category ?? '');
        $json_category = json_encode($category ?? '');

        // 汚いから後でwhenに変える
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
            $posts = $query->take(6)->get();
        } elseif (!empty($category && $book_tuber_category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->WhereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->take(6)->get();
        } elseif (!empty($category)) {
            $posts = Post::whereHas('categories', function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })->take(6)->get();
        } elseif (!empty($book_tuber_category)) {
            $posts = Post::whereHas('book_tuber_categories', function ($query) use ($book_tuber_category) {
                $query->whereIn('book_tuber_category_id', $book_tuber_category);
            })->take(6)->get();
        } else {
            $posts = Post::with('categories', 'user', 'likes')->orderBy('created_at', 'desc')->take(6)->get();
        }
        $categories = Category::all();
        $book_tuber_categories = BookTuberCategory::all();


        return view('search.result', [
            'posts' =>  $posts,
            'title' => 'search',
            'json_category' => $json_category,
            'search' => $search,
            'categories' => $categories,
            'book_tuber_categories' => $book_tuber_categories,
            'json_book_tuber_category' => $json_book_tuber_category,
        ]);
    }
}
