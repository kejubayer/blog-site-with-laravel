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
            $table->bigIncrements('id');
            $table->string('first_name',128)->nullable();
            $table->string('last_name',128)->nullable();
            $table->string('username',64)->unique()->nullable();
            $table->string('email',86)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('email_verification_token')->nullable();
            $table->string('password',86);
            $table->string('photo',128)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
