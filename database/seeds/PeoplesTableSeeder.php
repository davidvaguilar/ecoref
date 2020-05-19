<?php

use App\People;
use Illuminate\Database\Seeder;

class PeoplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = new People;
        $people->first_name = "DAVID";
        $people->father_surname = "VILLEGAS";
        $people->mother_surname = "AGUILAR";
        $people->email = "david.villegas.aguilar@gmail.com";
        $people->save();

        $people = new People;
        $people->first_name = "DAVID";
        $people->father_surname = "AGUILAR";
        $people->email = "david.aguilar@msn.com";
        $people->save();

    }
}
