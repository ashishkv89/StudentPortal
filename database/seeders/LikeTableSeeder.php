<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::inRandomOrder()->limit(20)->get();
        foreach($posts as $p)
        {
            $random=rand(1, User::count());
            $p->likes()->create(['user_id' => $random]);
        }

        $comments = Comment::inRandomOrder()->limit(20)->get();
        foreach($comments as $c)
        {
            $random=rand(1, User::count());
            $c->likes()->create(['user_id' => $random]);
        }
    }
}
