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
        $people->first_name = "abel";
        $people->middle_name = "diego";
        $people->father_surname = "castillo";
        $people->mother_surname = "aguilar";
        $people->client_id = "1";
        $people->save();

        $people = new People;
        $people->first_name = "pepe";
        $people->father_surname = "hernandez";
        $people->client_id = "2";
        $people->save();

        $people = new People;
        $people->first_name = "paco";
        $people->father_surname = "herrera";
        $people->client_id = "3";
        $people->save();

        $people = new People;
        $people->first_name = "francisco";
        $people->father_surname = "paredes";
        $people->client_id = "4";
        $people->save();
    }
}
