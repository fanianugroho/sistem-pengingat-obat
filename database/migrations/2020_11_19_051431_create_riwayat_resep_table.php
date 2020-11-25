<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_resep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_resep');
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::dropIfExists('riwayat_resep');
    }
}
