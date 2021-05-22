<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfekSampingObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efek_samping_obat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_efek_samping');
            $table->unsignedBigInteger('id_obat');
            $table->timestamps();

            $table->foreign('id_efek_samping')->references('id')->on('efek_samping')->onDelete('cascade');
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
        Schema::dropIfExists('efek_samping_obat');
    }
}
