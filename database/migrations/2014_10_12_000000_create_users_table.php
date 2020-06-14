<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 70)->unique();
            $table->string('password',100);
          //  $table->string('phone', 30);
            $table->string('url', 70)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            //ALTER TABLE `users` ADD `phone` VARCHAR(30) NOT NULL AFTER `deleted_at`;
           // ALTER TABLE `users`  ADD `phone` VARCHAR(30) NULL DEFAULT NULL  AFTER `email`;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
