<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_domains', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('user_id');
            $table->string('domain');
            $table->enum('status', [
                'AVAILABLE',
                'UNAVAILABLE',
            ])->nullable(true);
            $table->dateTime('expiry');
            $table->dateTime('last_checked');
            $table->timestamps();
			
			// Setup table relation constrains
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_domains');
    }
}
