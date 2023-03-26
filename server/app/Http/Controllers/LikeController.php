<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{

    protected $_like;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->_like = auth()->user()->likes();
            return $next($request);
        });
    }

    //いいねしている投稿の一覧ページ
    public function index()
    {
        return view('like.index', [
            'title' => 'ライブラリ',
            'likes' => $this->_like->withPivot('created_at AS joined_at')->orderBy('joined_at', 'desc')->take(12)->get(),
        ]);
    }

    public function destroy()
    {
        try {

            DB::transaction(function () {
                $this->_like->detach(request()->route('like'));
            });

            return redirect()->route('like.index')->with([
                'alert' => [
                    'type' => 'danger',
                    'message' => '動画本をお気に入りから削除しました。'
                ]
            ]);
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    //いいね機能
    public function ajaxfavorite(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->_like->toggle($request->post_id);
            });
        } catch (\Exception  $e) {
            logger()->error($e);
            throw $e;
        }
    }

    //投稿追加機能
    public function likeAjaxAddPost()
    {
        $offset = isset($_POST['post_num_now']) ? $_POST['post_num_now'] : 1;
        $posts_per_page = isset($_POST['post_num_add']) ? $_POST['post_num_add'] : 0;

        return view('api.like_add_post', [
            'likes' =>  $this->_like->withPivot('created_at AS joined_at')->offset($offset)->limit($posts_per_page)->orderBy('joined_at', 'desc')->take(12)->get()
        ]);
    }
}
