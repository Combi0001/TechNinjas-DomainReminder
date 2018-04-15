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
            // Setup user table
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('username')->unqiue();
            $table->string('password');
            $table->uuid('default_email_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            // Setup primary column
            $table->primary('uuid');
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
