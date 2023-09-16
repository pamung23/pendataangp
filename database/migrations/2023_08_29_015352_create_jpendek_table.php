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
        Schema::create('jpendek', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->date('tanggal');
            $table->date('tanggal_mulai');
            $table->string('periode');
            $table->foreignId('_perencanaan_pkk_id')->constrained('_perencanaan_pkk'); // Sesuaikan dengan nama tabel parent yang benar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jpendek');
    }
};
