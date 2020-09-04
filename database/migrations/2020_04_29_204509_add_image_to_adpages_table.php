<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToAdpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adpages', function (Blueprint $table) {
            $table->string('cover_image')->after('body');
            $table->string('logo_image')->after('cover_image');
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
            $table->dropColumn('cover_image');
            $table->dropColumn('logo_image');
        });
    }
}
