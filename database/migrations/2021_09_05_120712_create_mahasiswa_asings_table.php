<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaAsingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_asings', function (Blueprint $table) {
            $table->id();
            $table->string('paspor_tipe');
            $table->string('paspor_kode');
            $table->string('paspor_nomor');
            $table->string('visa_tipe');
            $table->string('visa_indeks');
            $table->string('expired_date');
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
        Schema::dropIfExists('mahasiswa_asings');
    }
}
