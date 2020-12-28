<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinumObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minum_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_obat_resep');
            $table->datetime('waktu_minum');
            
            $table->timestamps();

            $table->softDeletes(); 


            $table->foreign('id_obat_resep')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minum_obat');
    }
}
