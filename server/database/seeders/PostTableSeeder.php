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
        for ($i = 1; $i <= 10; $i++) {
            $posts[$i] = [
                'user_id' => $i,
                'title' => 'タイトル' . $i,
                'author' => '作者' . $i,
                'comment' => 'コメント' . $i,
                'video' => 'https://youtu.be/SSRnsxAua7c',
                'affiliate' => 'https://amzn.to/3yD5Mhe',
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
