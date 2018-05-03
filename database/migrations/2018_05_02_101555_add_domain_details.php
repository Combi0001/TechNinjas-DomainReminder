<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDomainDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE domains MODIFY status ENUM('AVAILABLE', 'UNAVAILABLE', 'UNSUPPORTED', 'QUEUED')");
        DB::statement("ALTER TABLE domains MODIFY expiry DATETIME");
        Schema::table('domains', function (Blueprint $table) {
            $table->dateTime('registration_date')->nullable(true)->after('expiry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE domains MODIFY status ENUM('AVAILABLE', 'UNAVAILABLE')");
        DB::statement("ALTER TABLE domains MODIFY expiry DATETIME NOT NULL");
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn('registration_date');
        });
    }
}
