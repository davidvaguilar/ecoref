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
        $people->email = "acastillo@dyi.cl";
        $people->save();

        $people = new People;
        $people->first_name = "pepe";
        $people->father_surname = "hernandez";
        $people->email = "phernandez@dyi.cl";
        $people->save();

        $people = new People;
        $people->first_name = "paco";
        $people->father_surname = "herrera";
        $people->email = "pherrera@dyi.cl";
        $people->save();

        $people = new People;
        $people->first_name = "francisco";
        $people->father_surname = "paredes";
        $people->email = "fparedes@dyi.cl";
        $people->save();
    }
}
