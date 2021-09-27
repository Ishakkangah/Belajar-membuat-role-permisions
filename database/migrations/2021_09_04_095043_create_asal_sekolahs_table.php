<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsalSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asal_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('asal_sekolah')->nullable();
            $table->string('negara')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('nomor_ijazah_sma')->nullable();
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
        Schema::dropIfExists('asal_sekolahs');
    }
}
