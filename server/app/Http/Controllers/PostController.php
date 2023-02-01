<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\BookTuberCategory;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

  protected $_post;

  public function __construct()
  {
      $this->middleware(function ($request, $next) {
          $this->_post = auth()->user()->posts();
          return $next($request);
      })
      ->except(['show']);
  }

  public function index()
  {
    return view('post.index', [
      'title' => '自分の投稿',
      'posts' => $this->_post->with('categories','book_tuber_categories')->latest()->paginate(10),
    ]);
  }


  public function create()
  {
    $categories = Category::all();
    $book_tuber_categories = BookTuberCategory::all();
    return view('post.create', [
      'title' => '新規投稿',
      'categories' => $categories,
      'book_tuber_categories' => $book_tuber_categories,
    ]);
  }


  public function store(PostRequest $request)
  {
    try {
      $params = $request->except('category', 'booktuber');

      $post = DB::transaction(function () use ($params) {
        return $this->_post->create($params);
      });

      DB::transaction(function () use ($post,$request) {
        $post->categories()->attach([$request->category]);
      });

      DB::transaction(function () use ($post,$request) {
        $post->book_tuber_categories()->attach([$request->booktuber]);
      });

      return redirect()->route('post.index')->with([
          'alert' => [
              'message' => '登録が完了しました。',
              'type' => 'success'
          ]
      ]);
  } catch (\Throwable  $e) {
      logger()->error($e);
      throw $e;
  }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    return view('post.show', [
      'title' => '投稿詳細',
      'post'  => Post::withCount('likes')->findOrFail(request()->route('post')),
      'likes' => new Like,
    ]);
  }

 
  public function edit()
  {
    return view('post.edit', [
      'title' => '投稿編集',
      'post'  => $this->_post->findOrFail(request()->route('post')),
      'categories' => Category::all(),
      'book_tuber_categories' => BookTuberCategory::all()
    ]);
  }

 
  public function update(PostRequest $request)
  {

    try {
      $params = $request->except('category_id', 'booktuber_category_id');

      DB::transaction(function () use ($params) {
        $this->_post->findOrFail(request()->route('post'))->fill($params)->update();
      });

      DB::transaction(function () use ($request) {
        $this->_post->findOrFail(request()->route('post'))->categories()->sync([$request->category_id]);
      });

      DB::transaction(function () use ($request) {
        $this->_post->findOrFail(request()->route('post'))->book_tuber_categories()->sync([$request->booktuber_category_id]);
      });

      return redirect()->route('post.index', request()->route('post'))->with([
          'alert' => [
              'message' => '投稿の編集が完了しました。',
              'type' => 'success'
          ]
      ]);
  } catch (\Throwable $e) {
      logger()->error($e);
      throw $e;
  }
  }


  public function destroy()
  {
    try {
      DB::transaction(function () {
        $this->_post->findOrFail(request()->route('post'))->delete();
      });

      return redirect()->route('post.index')->with([
          'alert' => [
              'message' => '投稿の削除が完了しました。',
              'type' => 'danger'
          ]
      ]);
  } catch (\Throwable $e) {
      logger()->error($e);
      throw $e;
  }
  }
}
