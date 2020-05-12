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
            $table->string('title', 80);
            $table->string('url', 80)->unique()->nullable();           
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
                $table->unsignedInteger('type_id')->nullable(); 
            $table->string('type_other')->nullable();
            $table->string('equipment')->nullable();
            $table->string('model')->nullable();
            $table->string('serie')->nullable();
                $table->unsignedInteger('problem_id')->nullable(); 
            $table->text('job')->nullable();

            $table->unsignedInteger('parameter_id')->nullable();

            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('vehicule_id')->nullable();
          //  $table->integer('kilometer_of')->nullable();
          //  $table->integer('kilometer_to')->nullable();

            $table->text('observation')->nullable();
            $table->string('email', 70)->nullable();
            $table->string('signature_id')->nullable();
            $table->string('file', 70)->nullable();
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
