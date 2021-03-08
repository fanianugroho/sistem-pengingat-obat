<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_users')->nullable();
            $table->string('dosis');
            $table->string('aturan_pakai');
            $table->mediumtext('takaran_minum');
            $table->enum('waktu_minum', ['Sebelum Makan', 'Saat Makan','Sesudah Makan']);
            $table->enum('keterangan', ['Kondisional', 'Harus Habis', 'Rutin']);
            $table->string('jml_obat');
            $table->string('jml_kali_minum');
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
