<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('url', 50)->unique()->nullable();           
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
                $table->unsignedInteger('type_id')->nullable(); 
            $table->string('type_other', 140)->nullable();
            $table->string('equipment', 50)->nullable();
            $table->string('model', 50)->nullable();
            $table->string('serie', 50)->nullable();
                $table->unsignedInteger('problem_id')->nullable();
            $table->text('job')->nullable();

            //PENDIENTE, ENVIADO        //FINALIZADO,
            $table->string('status', 15)->default("PENDIENTE");

            $table->unsignedInteger('parameter_id')->nullable();
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('vehicule_id')->nullable();

            $table->text('observation')->nullable();
            $table->unsignedInteger('signature_id')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
