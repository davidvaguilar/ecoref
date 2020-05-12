<?php

use App\Email;
use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = new Email;
        $email->alias = "david.villegas.aguilar";
        $email->domain = "gmail.com";
        $email->people_id = 1;
        $email->save();

        $email = new Email;
        $email->alias = "daniel";
        $email->domain = "correo.com";
        $email->people_id = 1;
        $email->save();
    }
}
