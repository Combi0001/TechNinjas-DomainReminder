/*
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePushDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('push_devices', function (Blueprint $table) {
            $table->string('endpoint')->after('user_id');
            $table->string('public_key', 88);
            $table->string('auth_token', 24);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('push_devices', function (Blueprint $table) {
            $table->dropColumn('endpoint');
            $table->dropColumn('public_key');
            $table->dropColumn('auth_token');
        });
    }
}
*/
