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
        Schema::create('desa_binaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->integer('no_register_kawasan')->default('100242015');
            $table->string('nama_kelompok');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraint untuk ID Desa
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_binaans');
    }
};
