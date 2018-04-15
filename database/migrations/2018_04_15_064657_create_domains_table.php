<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('domain');
            $table->enum('status', [
                'AVAILABLE',
                'UNAVAILABLE',
            ])->nullable(true);
            $table->dateTime('expiry');
            $table->dateTime('last_checked');
            $table->timestamps();

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
        Schema::dropIfExists('domains');
    }
}
