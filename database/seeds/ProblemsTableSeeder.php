<?php

use App\Problem;
use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problem = new Problem;
        $problem->name = "INTERVENCION DE TERCEROS";
        $problem->save();

        $problem = new Problem;
        $problem->name = "FALLA MECANICA";
        $problem->save();

        $problem = new Problem;
        $problem->name = "FALLA ELECTRICA";
        $problem->save();

        $problem = new Problem;
        $problem->name = "PROGRAMACION PARAMETROS";
        $problem->save();

        $problem = new Problem;
        $problem->name = "GAS REFRIGERANTE";
        $problem->save();

        $problem = new Problem;
        $problem->name = "OTRO";
        $problem->save();
    }
}
