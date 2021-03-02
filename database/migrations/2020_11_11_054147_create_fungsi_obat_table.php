<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFungsiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fungsi_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_fungsi');
            $table->unsignedBigInteger('id_obat');
            
            $table->timestamps();

            $table->foreign('id_fungsi')->references('id')->on('fungsi')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fungsi_obat');
    }
}
