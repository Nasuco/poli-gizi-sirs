<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ahli_gizi', function (Blueprint $table) {
            $table->id('id_ahligizi');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ahli_gizi');
    }
};
