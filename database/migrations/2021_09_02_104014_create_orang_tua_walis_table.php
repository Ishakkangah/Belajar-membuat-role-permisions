<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateOrangTuaWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua_walis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah_wali')->nullable();
            $table->string('ktp_ayah', 16)->nullable();
            $table->string('perkerjaan_ayah')->nullable();
            $table->string('nip_ayah', 16)->nullable();
            $table->string('pangkat_ayah')->nullable();
            $table->string('nama_instansi_ayah')->nullable();
            $table->string('alamat_instansi_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('ktp_ibu', 16)->nullable();
            $table->string('perkerjaan_ibu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orang_tua_walis');
    }
}
