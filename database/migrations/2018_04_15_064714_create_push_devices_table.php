<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_devices', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->uuid('user_id');
            $table->timestamps();

            // Setup primary column
            $table->primary('uuid');

            // Setup table relation constrains
            $table->foreign('user_id')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_devices');
    }
}
