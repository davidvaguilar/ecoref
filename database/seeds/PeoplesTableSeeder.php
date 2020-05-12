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
        $people->first_name = "david";
        $people->middle_name = "moises";
        $people->father_surname = "villegas";
        $people->mother_surname = "aguilar";
        $people->client_id = "1";
        $people->save();

        $people = new People;
        $people->first_name = "daniel";
        $people->father_surname = "hernandez";
        $people->client_id = "2";
        $people->save();
    }
}
