<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;
        $u->id = 1;
        $u->name = "Divya Saseendran";
        $u->email = "divyasaseendran1989@gmail.com";
        $u->password = bcrypt("Password1");
        $u->phone = "+447949337111";
        $u->address = "71 St Helens Avenue\nSwansea\nSA1 4NN";
        $u->role_id = 1;
        $u->save();

        $u = new User;
        $u->id = 2;
        $u->name = 'Aadhya Ashish';
        $u->email = "aadhyaashish18@gmail.com";
        $u->password = bcrypt("Password2");
        $u->phone = "+447949337112";
        $u->address = "72 St Helens Avenue\nSwansea\nSA1 4NN";
        $u->role_id = 2;
        $u->save();

        $u = new User;
        $u->id = 3;
        $u->name = 'Aaryan Ashish';
        $u->email = "aaryanashish20@gmail.com";
        $u->password = bcrypt("Password3");
        $u->phone = "+447949337113";
        $u->address = "72 St Helens Avenue\nSwansea\nSA1 4NN";
        $u->role_id = 2;
        $u->save();
    }
}
