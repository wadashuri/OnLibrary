<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
  protected $_category;

  public function __construct()
  {
      $this->middleware(function ($request, $next) {
          $this->_category = Category::query();
          return $next($request);
      });
  }



    public function index()
    {
        return view('category.index', [
            'title' => 'カテゴリー一覧',
            'categories' =>  $this->_category->paginate(10),
        ]);
    }



    public function create()
  {
    return view('category.create', [
      'title' => 'カテゴリー投稿'
    ]);
  }


  public function store(Request $request)
  {
    try {
      $params = $request->input();

      DB::transaction(function () use ($params) {
          Category::create($params);
      });

      return redirect()->route('category.index')->with([
          'alert' => [
              'message' => 'カテゴリー登録が完了しました。',
              'type' => 'success'
          ]
      ]);
  } catch (\Throwable  $e) {
      logger()->error($e);
      throw $e;
  }
  }


  public function edit()
  {
    return view('category.edit', [
      'title' => 'カテゴリー編集',
      'categories' => $this->_category->findOrFail(request()->route('category')),
    ]);
  }


  public function update(Request $request)
  {
    try {
      $params = $request->input();

      DB::transaction(function () use ($params) {
        $this->_category->findOrFail(request()->route('category'))->fill($params)->update();
      });

      return redirect()->route('category.edit', request()->route('category'))->with([
          'alert' => [
              'message' => 'カテゴリーの編集が完了しました。',
              'type' => 'success'
          ]
      ]);
  } catch (\Throwable $e) {
      logger()->error($e);
      throw $e;
  }
  }
  

  public function destroy($id)
  {
    try {
      DB::transaction(function () {
        $this->_category->findOrFail(request()->route('category'))->delete();
      });

      return redirect()->route('category.index')->with([
          'alert' => [
              'message' => 'カテゴリーの削除が完了しました。',
              'type' => 'danger'
          ]
      ]);
  } catch (\Throwable $e) {
      logger()->error($e);
      throw $e;
  }
}
}
