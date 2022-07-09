<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    //いいねしている投稿の一覧ページ
    public function index()
    {
        $likes = Auth::user()->likes;
        return view('likes.index', [
            'title' => 'いいね一覧',
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
