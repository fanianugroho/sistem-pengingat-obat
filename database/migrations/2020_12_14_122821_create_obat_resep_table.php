<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_resep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_obat');
            $table->unsignedBigInteger('id_resep');
            $table->string('dosis');
            $table->string('aturan_pakai');
            $table->float('takaran_minum');
            $table->enum('waktu_minum', ['Sebelum Makan', 'Saat Makan','Sesudah Makan']);
            $table->enum('keterangan', ['Kondisional', 'Harus Habis', 'Rutin']);
            $table->string('jml_obat');
            $table->float('jml_kali_minum');
            $table->timestamps();

            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
            $table->foreign('id_resep')->references('id')->on('resep')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_resep');
    }
}
