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
        $p->title = "HEAD OF ENGLISH, JOHN DOUGLAS-FIELD, REFLECTS ON THE IMPORTANCE OF POETRY";
        $p->description = "My Michaelmas Term always has a poetic flavour. National Poetry Day falls in early October and, this year, we celebrated the day with the charismatic performer and poet, Luke Wright. He took assembly and worked with L5 and M5, sharing his insights into the poems M5 are studying for IGCSE English Literature.";
        $p->image = "images/1.jpg";
        $p->view_count= 100;
        $p->user_id = 1;
        $p->save();

        $p = new Post;
        $p->id = 2;
        $p->title = "IVY FISHER ON HER LOVE FOR HORSE RIDING";
        $p->description = "Upper Sixth Pupil, Ivy Fisher competes in the sport of Eventing which involves dressage, show jumping and cross country. This summer she competed in several International Events including Belsay International and Cornbury House British Junior Championships where she was placed an amazing sixth, with a double clear in showjumping and cross country.";
        $p->image = "images/2.jpg";
        $p->view_count= 200;
        $p->user_id = 1;
        $p->save();

        $p = new Post;
        $p->id = 3;
        $p->title = "DUNCAN MALLETT ON HIS BIG WIN AT SILVERSTONE";
        $p->description = "I was into racing from a young age, having grown up watching formula 1. Growing up on a farm enabled me to start driving from a young age, this gave me the opportunity to learn different driving skills that I couldn’t learn on the road. My father competed in the same racing series in 2016 and by the end of his season, after watching his success and failure, I knew in time, I wanted to do it.";
        $p->image = "images/3.jpg";
        $p->view_count= 300;
        $p->user_id = 2;
        $p->save();

        Post::factory()->count(27)->create();
    }
}
