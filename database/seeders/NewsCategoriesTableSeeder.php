<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        for ($i = 1; $i <= 10; $i++){
            $catName = 'Category №'.$i;
            $categories[] = ['name' => $catName];
        }
        \DB::table('news_categories')->insert($categories);
    }
}
