<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuMinumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_minum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_minum_obat');
            $table->string('jam_minum');
            $table->time('waktu');
            $table->string('keterangan')->nullable();
            $table->timestamps(); 

            $table->foreign('id_minum_obat')->references('id')->on('minum_obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_minum');
    }
}
