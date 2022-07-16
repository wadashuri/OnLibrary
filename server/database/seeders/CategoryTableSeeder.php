<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $categories = [
                'id' => 1,
                'category' => '投資',
            ];
        DB::table('categories')->insert($categories);

        $categories = [
            'id' => 2,
            'category' => '自己啓発',
        ];
        DB::table('categories')->insert($categories);

        $categories = [
            'id' => 3,
            'category' => 'その他s',
        ];
        DB::table('categories')->insert($categories);
    }
}
