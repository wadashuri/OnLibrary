<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $posts[$i] = [
                'user_id' => $i,
                'title' => 'タイトル' . $i,
                'author' => '作者' . $i,
                'comment' => 'コメント' . $i,
                'video' => '<iframe width="260" height="115" src="https://www.youtube.com/embed/2ZtGl8mpg74" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'affiliate' => 'アフィリエイト広告'. $i,
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
