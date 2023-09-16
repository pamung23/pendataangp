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
        Schema::create('_perencanaan_pkk', function (Blueprint $table) {
            $table->id();
            $table->integer('no_register_kawasan')->default('100242015');
            $table->string('jpan_nomor');
            $table->date('jpan_tanggal');
            $table->date('jpan_mulai');
            $table->date('jpan_akhir');
            $table->string('jpen_nomor');
            $table->date('jpen_tanggal');
            $table->Integer('jpen_periode');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_perencanaan_pkk');
    }
};
