<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $u)
        {
            $random=rand(10,5000);
            $u->image()->create(['path' => 'https://picsum.photos/600/400?random='.$random]);
        }

        $posts = Post::all();
        foreach($posts as $p)
        {
            $random=rand(10,5000);
            $p->image()->create(['path' => 'https://picsum.photos/600/400?random='.$random]);
        }
    }
}
