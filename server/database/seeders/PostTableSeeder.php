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
        for ($i = 1; $i <= 30; $i++) {
            $posts[$i] = [
                'user_id' => $i,
                'title' => 'タイトル' . $i,
                'comment' => 'コメント' . $i,
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
