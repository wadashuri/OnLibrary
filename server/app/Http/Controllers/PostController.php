<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
  public function index()
  {
    $posts = Auth::user()->posts->load('categories');
    return view('posts.index', [
      'title' => '自分の投稿',
      'posts' => $posts,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('posts.create', [
      'title' => '新規投稿',
      'categories' => $categories,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  // 投稿追加処理
  public function store(PostRequest $request)
  {
    Post::create([
      'user_id' => Auth::user()->id,
      'title' => $request->title,
      'comment' => $request->comment,
    ]);
    $post_id = Post::select('id')->latest()->first();
    CategoryPost::create([
      'category_id' => $request->category,
      'post_id' => $post_id->id,
    ]);

    session()->flash('success', '投稿を追加しました');
    return redirect()->route('posts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show', [
      'title' => '投稿詳細',
      'post'  => $post,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // ルーティングパラメータで渡されたidを利用してインスタンスを取得
    $post = Post::find($id);
    $categories = Category::all();
    return view('posts.edit', [
      'title' => '投稿編集',
      'post'  => $post,
      'categories' => $categories,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update($id, PostRequest $request)
  {
    //コメントを編集
    $post = Post::find($id);
    $post->update($request->only(['comment', 'title']));
    //カテゴリーを編集
    CategoryPost::where('post_id', $id)->update(['category_id' => $request->category_id]);

    session()->flash('success', '投稿を編集しました');
    return redirect()->route('posts.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    session()->flash('success', '投稿を削除しました');
    return redirect()->route('posts.index');
  }
}
