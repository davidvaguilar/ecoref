<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type;
        $type->name = "SERVICIO";
        $type->save();

        $type = new Type;
        $type->name = "EMERGENCIA";
        $type->save();

        $type = new Type;
        $type->name = "MANTENCION";
        $type->save();

        $type = new Type;
        $type->name = "DIAGNOSTICO";
        $type->save();

        $type = new Type;
        $type->name = "EJECUCION PRESUPUESTO";
        $type->save();

        $type = new Type;
        $type->name = "OTRO";
        $type->save();
    }
}
