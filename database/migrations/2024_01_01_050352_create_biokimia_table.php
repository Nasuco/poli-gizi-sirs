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
        Schema::create('biokimia', function (Blueprint $table) {
            $table->id();
            $table->string('hb');
            $table->string('gds');
            $table->string('kolesterol');
            $table->string('trigliserit');
            $table->string('sgot');
            $table->string('sgpt');
            $table->string('albumin');
            $table->string('ureum');
            $table->string('kreatinin');
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
        Schema::dropIfExists('biokimia');
    }
};
