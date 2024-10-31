<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name'=>'Kategorija 1',
                'slug'=>'kat1'
            ],
            [
                'name'=>'Kategorija 2',
                'slug'=>'kat2'
            ],
        ]);
    }
}
