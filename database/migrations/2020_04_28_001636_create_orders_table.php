<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 80);
            $table->string('url', 80)->unique()->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('category_id')->nullable(); 

            $table->dateTime('arrival_at')->nullable();
            $table->dateTime('goes_at')->nullable();
                $table->unsignedInteger('type_id')->nullable(); 
            $table->string('type_other')->nullable();
            $table->string('equipment')->nullable();
            $table->string('model')->nullable();
            $table->string('serie')->nullable();
                $table->unsignedInteger('problem_id')->nullable(); 
            $table->text('job')->nullable();

            $table->unsignedInteger('client_id')->nullable();
            
            $table->unsignedInteger('vehicle_id')->nullable();
            $table->text('observation')->nullable();
            $table->string('signature_id')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
