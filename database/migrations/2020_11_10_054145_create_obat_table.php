<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_obat');
            $table->string('kode_obat')->nullable(); 
            $table->unsignedBigInteger('id_bentuk_obat');
            $table->string('kekuatan_sediaan');
            $table->enum('satuan', ['ml', 'mg']);
            $table->string('petunjuk_penyimpanan');
            $table->string('pola_makan')->nullable();
            $table->string('informasi')->nullable();
            $table->unsignedBigInteger('id_users')->nullable(); 
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_bentuk_obat')->references('id')->on('bentuk_obat')->onDelete('cascade');
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
        Schema::dropIfExists('obat');
    }
}
