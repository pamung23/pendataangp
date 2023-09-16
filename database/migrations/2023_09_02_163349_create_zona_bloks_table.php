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
        Schema::create('zona_bloks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_desa');
            $table->integer('no_register_kawasan')->default('100242015');
            $table->decimal('luas_ha', 10, 2);
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
        Schema::dropIfExists('zona_bloks');
    }
};
