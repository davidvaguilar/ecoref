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
        $client->code = "GEN";
        $client->name = "PARTICULAR";
        $client->title = "PARTICULAR";
        $client->adress = "SECTOR CIUDAD";
        $client->city = "NORTE";
        $client->save();

        $client = new Client;
        $client->code = "681";
        $client->name = "UNIMARC";
        $client->title = "ROTONDA";
        $client->adress = "AV. 18 DE SEPTIEMBRE #2501";
        $client->city = "ARICA";
        $client->save();

        $client = new Client;
        $client->code = "923";
        $client->name = "UNIMARC";
        $client->title = "SANTA MARIA";
        $client->adress = "AV. SANTA MARIA 2465";
        $client->city = "ARICA";
        $client->save();

        $client = new Client;
        $client->code = "600";
        $client->name = "UNIMARC";
        $client->title = "ALTO HOSPICIO 2";
        $client->adress = "RUTA A-16 #3350";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "85";
        $client->name = "UNIMARC";
        $client->title = "AMUNATEGUI";
        $client->adress = "AMUNATEGUI # 902";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "86";
        $client->name = "UNIMARC";
        $client->title = "BILBAO";
        $client->adress = "FRANCISCO BILBAO # 3545";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "9004";
        $client->name = "UNIMARC";
        $client->title = "CENTRO PRODUCCION IQUIQUE";
        $client->adress = "FRANCISCO BILBAO # 3545";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "105";
        $client->name = "UNIMARC";
        $client->title = "IQUIQUE CENTRO";
        $client->adress = "TARAPACA # 579";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "87";
        $client->name = "UNIMARC";
        $client->title = "JUAN MARTINEZ";
        $client->adress = "MANUEL RODRIGUEZ # 964";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "106";
        $client->name = "UNIMARC";
        $client->title = "LOS MOLLES";
        $client->adress = "SANTIAGO POLANCO # 2251";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "103";
        $client->name = "UNIMARC";
        $client->title = "VIVAR";
        $client->adress = "VIVAR # 786";
        $client->city = "IQUIQUE";
        $client->save();

        $client = new Client;
        $client->code = "9002";
        $client->name = "UNIMARC";
        $client->title = "CENTRO PRODUCCION ANTOFAGASTA";
        $client->adress = "PEDRO AGUIRRE CERDA # 8722-8742";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "19";
        $client->name = "UNIMARC";
        $client->title = "BONILLA";
        $client->adress = "HUAMACHUCO # 8481";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "33";
        $client->name = "UNIMARC";
        $client->title = "COVIEFI";
        $client->adress = "AV. ARGENTINA # 1910";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "28";
        $client->name = "UNIMARC";
        $client->title = "EL PARQUE";
        $client->adress = "AV. JOSE MIGUEL CARRERA # 1527";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "29";
        $client->name = "UNIMARC";
        $client->title = "GRAN VIA";
        $client->adress = "AV. ANGAMOS # 0159";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "26";
        $client->name = "UNIMARC";
        $client->title = "SANTOS OSSA";
        $client->adress = "JOSE SANTOS OSSA # 2421";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "34";
        $client->name = "UNIMARC";
        $client->title = "LA CHIMBA I";
        $client->adress = "PEDRO AGUIRRE CERDA # 8722-8742";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "961";
        $client->name = "UNIMARC";
        $client->title = "LA CHIMBA II";
        $client->adress = "PEDRO AGUIRRE CERDA # 11385";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "47";
        $client->name = "UNIMARC";
        $client->title = "LA PLAZA";
        $client->adress = "IGNACIO CARRERA PINTO # 909";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "13";
        $client->name = "UNIMARC";
        $client->title = "LA TORRE I";
        $client->adress = "CARLOS PEZOA VELIZ # 10 AL 22";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "48";
        $client->name = "UNIMARC";
        $client->title = "OVIEDO CAVADA";
        $client->adress = "CARLOS OVIEDO CAVADA # 5319";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "27";
        $client->name = "UNIMARC";
        $client->title = "PAMPINO";
        $client->adress = "AV. SANSOS OSSA # 2350";
        $client->city = "ANTOFAGASTA";
        $client->save();

        $client = new Client;
        $client->code = "674";
        $client->name = "UNIMARC";
        $client->title = "BRASILIA";
        $client->adress = "BRASILIA # 2386";
        $client->city = "CALAMA";
        $client->save();

        $client = new Client;
        $client->code = "46";
        $client->name = "UNIMARC";
        $client->title = "CALAMA I";
        $client->adress = "GRANADEROS # 3180";
        $client->city = "CALAMA";
        $client->save();

        $client = new Client;
        $client->code = "111";
        $client->name = "UNIMARC";
        $client->title = "CALAMA II";
        $client->adress = "ACONCAGUA # 2588";
        $client->city = "CALAMA";
        $client->save();

        $client = new Client;
        $client->code = "673";
        $client->name = "UNIMARC";
        $client->title = "LA TORRE II";
        $client->adress = "LATORRE # 2149";
        $client->city = "CALAMA";
        $client->save();

        $client = new Client;
        $client->code = "110";
        $client->name = "UNIMARC";
        $client->title = "TOCOPILLA II";
        $client->adress = "POLICARPO TORO # 215";
        $client->city = "CALAMA"; 
        $client->save();
    }
}
