<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{

    //未ログイン時はログインさせない
    public function __construct()
    {
        $this->middleware('auth');
    }

    //いいねしている投稿の一覧ページ
    public function index()
    {
        $likes = Auth::user()->likes;
        return view('likes.index', [
            'title' => 'ライブラリ',
            'likes' => $likes,
        ]);
    }

    public function show($id)
  {
    $likes = new Like;
    $post = Post::find($id);
    return view('likes.show', [
      'title' => '投稿詳細',
      'post'  => $post,
      'likes' => $likes,
    ]);
  }

    //いいね機能
    public function ajaxfavorite(Request $request)
    {
        $user_id = Auth::user()->id;
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if (!$already_liked) {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
    }

    public function destroy($post_id)
    {
        $user_id = Auth::user()->id;
        Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        session()->flash('success', '投稿を削除しました');
        return redirect()->route('likes.index');
    }
}
