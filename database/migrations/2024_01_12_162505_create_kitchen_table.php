<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kitchen', function (Blueprint $table) {
            $table->id('id_kitchen');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->unsignedBigInteger('screening_id');
            $table->foreign('screening_id')->references('id_screening')->on('screening');
            $table->string('nama');
            $table->boolean('konfirmasi_makanan')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kitchen');
    }
};
