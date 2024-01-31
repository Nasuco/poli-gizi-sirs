<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gizi', function (Blueprint $table) {
            $table->id();
            $table->string('pola_makan');
            $table->string('kebiasaan_minum');
            $table->string('makanan_selingan');
            $table->string('diit_smrs');
            $table->text('btm');
            $table->text('suplemen');
            $table->text('aktivitas_fisik');
            $table->text('konseling_gizi');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gizi');
    }
};
