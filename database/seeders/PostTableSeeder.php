<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->id = 1;
        $p->title = "Photo";
        $p->description = "From yesterday's trip";
        $p->image = "images/1.jpg";
        $p->user_id = 1;
        $p->save();

        $p = new Post;
        $p->id = 2;
        $p->title = "Pictures";
        $p->description = "From today's trip";
        $p->image = "images/2.jpg";
        $p->user_id = 1;
        $p->save();

        $p = new Post;
        $p->id = 3;
        $p->title = "Click";
        $p->description = "From yesterday's trip";
        $p->image = "images/3.jpg";
        $p->user_id = 2;
        $p->save();

        Post::factory()->count(17)->create();
    }
}
