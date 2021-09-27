<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToOrangTuaWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orang_tua_walis', function (Blueprint $table) {
            $table->string('slug')->after('nama_ayah_wali');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orang_tua_walis', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
