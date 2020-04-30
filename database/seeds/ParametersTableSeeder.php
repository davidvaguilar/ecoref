<?php

use App\Parameter;
use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter = new Parameter;
        $parameter->type = "MEDIA";
        $parameter->save();

        $parameter = new Parameter;
        $parameter->type = "BAJO";
        $parameter->save();

        $parameter = new Parameter;
        $parameter->type = "BAJO";
        $parameter->save();

        $parameter = new Parameter;
        $parameter->type = "MEDIA";
        $parameter->save();
    }
}
