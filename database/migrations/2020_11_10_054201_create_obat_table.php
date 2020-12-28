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
            $table->unsignedBigInteger('id_bentuk_obat');
            $table->string('kesediaan');
            $table->enum('satuan', ['ml', 'mg']);
            $table->unsignedBigInteger('id_kontraindikasi_obat');
            $table->unsignedBigInteger('id_interaksi_obat');
            $table->string('efek_samping');
            $table->string('petunjuk_penyimpanan');
            $table->string('pola_makan');
            $table->string('informasi');
            $table->unsignedBigInteger('id_users')->nullable(); 
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_bentuk_obat')->references('id')->on('bentuk_obat')->onDelete('cascade');
            $table->foreign('id_kontraindikasi_obat')->references('id')->on('kontraindikasi_obat')->onDelete('cascade');
            $table->foreign('id_interaksi_obat')->references('id')->on('interaksi_obat')->onDelete('cascade');
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
