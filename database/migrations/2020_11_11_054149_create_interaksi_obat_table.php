<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteraksiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaksi_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_interaksi');
            $table->unsignedBigInteger('id_obat');
            $table->timestamps();

            $table->foreign('id_interaksi')->references('id')->on('interaksi')->onDelete('cascade');
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
        Schema::dropIfExists('interaksi_obat');
    }
}
