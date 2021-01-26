<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnInBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blood_requests', function (Blueprint $table) {
             $table->dropColumn('blood_grp');
             $table->unsignedTinyInteger('blood_group')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_requests', function (Blueprint $table) {
            $table->dropColumn('blood_group');
            $table->string('blood_grp')->after('name');
        });
    }
}
