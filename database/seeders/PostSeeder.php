<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(30)->create();

        $posts = Post::all();
        $tags = Tag::query()->count();

        foreach ($posts as $post) {
            $post->tags()->attach(rand(1, $tags));
        }
    }
}
