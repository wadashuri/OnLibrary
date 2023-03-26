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
        $book_tuber_category = $request->book_tuber_category === null ? [] : $request->book_tuber_category;
        $category = $request->category === null ? [] : $request->category;
        $search = $request->input('search');
        $category_string = null;
        $book_tuber_category_string = null;

        #配列を文字列に変換
        $category_string = $this->arrayToString($category);
        $book_tuber_category_string = $this->arrayToString($book_tuber_category);

        return view(
            'search.index',
            compact('category', 'book_tuber_category', 'search', 'category_string', 'book_tuber_category_string'),
            [
                'title' => 'search',
                'posts' =>  Post::searchPost($search, $category, $book_tuber_category)
                    ->with('categories', 'user', 'likes')
                    ->orderBy('created_at', 'desc')->take(12)->get(),
                'categories' => Category::all(),
                'book_tuber_categories' => BookTuberCategory::all(),
            ]
        );
    }

    // 投稿追加機能
    public function searchAjaxAddPost(Request $request)
    {
        $offset = isset($_POST['post_num_now']) ? $_POST['post_num_now'] : 1;
        $posts_per_page = isset($_POST['post_num_add']) ? $_POST['post_num_add'] : 0;

        # 文字列を配列に変換
        $book_tuber_category = $this->explodeToString($_POST['book_tuber_category_string']);
        $category = $this->explodeToString($_POST['category_string']);

        $search = isset($_POST['search']) ? $_POST['search'] : null;

        return view(
            'api.search_add_post',
            compact('search'),
            [
                'title' => 'search',
                'posts' =>  Post::searchPost($search, $category, $book_tuber_category)
                    ->with('categories', 'user', 'likes')
                    ->offset($offset)->limit($posts_per_page)
                    ->orderBy('created_at', 'desc')->take(12)->get(),
                'categories' => Category::all(),
                'book_tuber_categories' => BookTuberCategory::all(),
            ]
        );
    }



    # 文字列を配列にして返す
    private function explodeToString($string)
    {
        return $string === '' ? null : explode(",", $string);
    }

    # 配列を文字列にして返す
    private function arrayToString($array)
    {
        return implode(",", $array);
    }
}
