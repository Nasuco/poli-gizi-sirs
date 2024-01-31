<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('screening', function (Blueprint $table) {
            $table->id('id_screening');
            // $table->time('jam_screening');
            // $table->date('tgl_screening');
            $table->unsignedBigInteger('id_ahligizi');
            $table->foreign('id_ahligizi')->references('id_ahligizi')->on('ahli_gizi');
            $table->unsignedBigInteger('id_pasien');
		    $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->string('diagnosis_medis')->nullable();
            $table->string('risiko')->nullable();
            $table->boolean('difabel')->default(false);
            $table->string('alergi_makanan')->nullable();
            $table->text('preskripsi_diet')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->unsignedBigInteger('id_antropometri')->nullable();
            $table->foreign('id_antropometri')->references('id')->on('antropometri');
            $table->unsignedBigInteger('id_biokimia')->nullable();
            $table->foreign('id_biokimia')->references('id')->on('biokimia');
            $table->unsignedBigInteger('id_fisik')->nullable();
            $table->foreign('id_fisik')->references('id')->on('fisik');
            $table->unsignedBigInteger('id_gizi')->nullable();
            $table->foreign('id_gizi')->references('id')->on('gizi');
            $table->text('riwayat_personal')->nullable();
            $table->text('diagnosis_gizi')->nullable();
            $table->text('intervensi_gizi')->nullable();
            $table->text('rencana_monitoring')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('screening');
    }
};