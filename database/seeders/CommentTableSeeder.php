<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->id = 1;
        $c->message = "Excellent article !";
        $c->post_id = 1;
        $c->user_id = 1;
        $c->save();

        $c = new Comment;
        $c->id = 2;
        $c->message = "Wish I was there";
        $c->post_id = 1;
        $c->user_id = 2;
        $c->save();

        Comment::factory()->count(98)->create();    
    }
}
