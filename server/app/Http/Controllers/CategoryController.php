<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', [
            'title' => 'カテゴリー一覧',
            'categories' =>  $categories,
        ]);
    }

    public function create()
  {
    $categories = Category::all();
    return view('category.create', [
      'title' => '新規投稿',
      'categories' => $categories,
    ]);
  }

  public function store(Request $request)
  {
    Category::create([
      'category' => $request->name,
    ]);
    return redirect()->route('categories.index');
  }

  public function edit($id)
  {
    // ルーティングパラメータで渡されたidを利用してインスタンスを取得
    $categories = Category::find($id);
    return view('category.edit', [
      'title' => '投稿編集',
      'categories' => $categories,
    ]);
  }

  public function update($id, Request $request)
  {
    //コメントを編集
    $post = Category::find($id);
    $post->update($request->only(['category']));
    
    return redirect()->route('categories.index');
  }

  public function destroy($id)
  {
    $post = Category::find($id);
    $post->delete();
   
    return redirect()->route('categories.index');
  }
}
