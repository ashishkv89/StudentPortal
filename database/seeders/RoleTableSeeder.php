<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = new Role;
        $r->id = 1;
        $r->name = "Teacher";
        $r->save();

        $r = new Role;
        $r->id = 2;
        $r->name = "Student";
        $r->save();
    }
}
