<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetunjukPenyimpananObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petunjuk_penyimpanan_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_petunjuk_penyimpanan');
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
        Schema::dropIfExists('petunjuk_penyimpanan_obat');
    }
}
