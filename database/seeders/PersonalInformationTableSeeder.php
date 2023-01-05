<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PersonalInformation;
use App\Models\User;

class PersonalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = new PersonalInformation;
        $x->date_of_birth = "1989-09-18";
        $x->address = "70 St Helen's Avenue\nSwansea\nSA1 4NN";
        $x->emergency_contact_name = "Ashish Vijayamohandas";
        $x->emergency_contact_phone = "+447949337111";
        $x->user_id = 1;

        $x->save();

        $x = new PersonalInformation;
        $x->date_of_birth = "2018-05-28";
        $x->address = "10 Lon-Ger-Y-Coed\nCardiff\nCA1 6JM";
        $x->emergency_contact_name = "Aju Jose";
        $x->emergency_contact_phone = "+447293748666";
        $x->user_id = 2;
        $x->save();

        $x = new PersonalInformation;
        $x->date_of_birth = "2020-05-18";
        $x->address = "23 High Street\nLondon\nNK1 7MK";
        $x->emergency_contact_name = "Liju Raju";
        $x->emergency_contact_phone = "+447947098518";
        $x->user_id = 3;
        $x->save();
        
        PersonalInformation::factory()->count((User::count())-3)->create();
    }
}
