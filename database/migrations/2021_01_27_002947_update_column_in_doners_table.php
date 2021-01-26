<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnInDonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doners', function (Blueprint $table) {
            $table->dropColumn('blood_grp');
            $table->unsignedTinyInteger('blood_group')->after('donor_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doners', function (Blueprint $table) {
            $table->dropColumn('blood_group');
            $table->string('blood_grp')->after('donor_name');
        });
    }
}
