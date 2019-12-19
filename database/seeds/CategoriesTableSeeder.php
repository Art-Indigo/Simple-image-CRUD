<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories[] = [
            'name' => 'Without category',
            'description' => '',
            'parent_id' => '0'
        ];

        for($i = 2; $i < 15; $i++){
            $categoryName = 'Category '.$i;
            $parentId = ($i > 6) ? rand(1, 5) : 1;
            $categories[] = [
                'name' => $categoryName,
                'description' => '',
                'parent_id' => $parentId
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
