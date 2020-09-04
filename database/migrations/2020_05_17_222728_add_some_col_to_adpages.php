<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColToAdpages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adpages', function (Blueprint $table) {
            $table->string('service')->after('body');
            $table->string('email')->after('service');
            $table->string('phone')->after('email');
            $table->string('location')->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adpages', function (Blueprint $table) {
            $table->dropColumn('service');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('location');
        });
    }
}
