<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title'=>'Post3 naslov',
            'excerpt'=>'Pocetak posta3',
            'body'=>'Ceo tekst posta3',
            'slug'=>'post-3',
            'category_id'=>1,
            'user_id'=>3
            ]
        );
    }
}
