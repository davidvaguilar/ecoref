<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('tipo', 2);        
            $table->string('temperatura', 2)->nullable();
            $table->unsignedInteger('presion_baja')->nullable();
            $table->unsignedInteger('presion_alta')->nullable();
            //falta un tipo tag de refrigerantes.
            $table->string('refrigerante', 10)->nullable();
            $table->string('aceite', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
