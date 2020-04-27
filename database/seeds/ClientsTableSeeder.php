<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client;
        $client->code = "123";
        $client->name = "McDonald";
        $client->title = "Local 1";
        $client->adress = "Heroes de la concepcion";
        $client->city = "Iquique";
        $client->save();

        $client = new Client;
        $client->code = "1234";
        $client->name = "Santander";
        $client->title = "Local Centro";
        $client->adress = "Vivar";
        $client->city = "Iquique";
        $client->save();

        $client = new Client;
        $client->code = "12345";
        $client->name = "Banco estado";
        $client->title = "Local Central";
        $client->adress = "Amunategui";
        $client->city = "Iquique";
        $client->save();

        $client = new Client;
        $client->code = "123456";
        $client->name = "Lider";
        $client->title = "Local Norte";
        $client->adress = "Amunategui";
        $client->city = "Antofagasta";
        $client->save();
    }
}
