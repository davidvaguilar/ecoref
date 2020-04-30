<?php

use App\Refrigerant;
use Illuminate\Database\Seeder;

class RefrigerantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refrigerant = new Refrigerant;
        $refrigerant->name = "R.22";
        $refrigerant->save();

        $refrigerant = new Refrigerant;
        $refrigerant->name = "R.404";
        $refrigerant->save();

        $refrigerant = new Refrigerant;
        $refrigerant->name = "R.507";
        $refrigerant->save();

        $refrigerant = new Refrigerant;
        $refrigerant->name = "R";
        $refrigerant->save();

    }
}
