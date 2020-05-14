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
            $table->string('type', 10)->nullable();       
            $table->string('temperature', 2)->nullable();
            $table->unsignedInteger('pressure_low')->nullable();
            $table->unsignedInteger('pressure_high')->nullable();
            $table->string('refrigerant', 10)->nullable();
            $table->string('oil', 10)->nullable();
            $table->string('refrigerant_id', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
