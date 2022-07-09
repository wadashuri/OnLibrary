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
                'category' => 'Php',
            ];
        DB::table('categories')->insert($categories);

        $categories = [
            'id' => 2,
            'category' => 'React',
        ];
        DB::table('categories')->insert($categories);

        $categories = [
            'id' => 3,
            'category' => 'Laravel',
        ];
        DB::table('categories')->insert($categories);
    }
}
