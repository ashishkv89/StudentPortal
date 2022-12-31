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
        $posts = Post::all();
        foreach($posts as $post)
        {
            $post->likes()->create(['count' => rand(0, 1000), 'user_id' => rand(1, User::count())]);
        //    $post->likes()->create(['user_id' => rand(1, User::count())]);
        }

        $comments = Comment::all();
        foreach($comments as $comment)
        {
            $comment->likes()->create(['count' => rand(0, 1000), 'user_id' => rand(1, User::count())]);
        //    $comment->likes()->create(['user_id' => rand(1, User::count())]);
        }
    }
}
