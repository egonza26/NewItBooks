<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categ_one = new Category();
        $categ_one->slug = 'laravel';
        $categ_one->name = 'Laravel';
        $categ_one->save();

        $categ_two = new Category();
        $categ_two->slug = 'php';
        $categ_two->name = 'PHP';
        $categ_two->save();
    }
}
