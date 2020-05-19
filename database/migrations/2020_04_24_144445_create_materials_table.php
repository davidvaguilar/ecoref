<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');        
            $table->unsignedInteger('quantity');
            $table->string('detail', 70);
            $table->unsignedInteger('price')->nullable();

            $table->unsignedInteger('post_id')->nullable();  //aca deve ir order
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('quote_id')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
