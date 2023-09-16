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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan', 50)->nullable();
            $table->string('pintu_masuk', 50)->nullable();
            $table->string('pintu_keluar', 50)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('organisasi_nama')->nullable();
            $table->string('organisasi_alamat')->nullable();
            $table->string('organisasi_telepon', 20)->nullable();
            $table->string('anggota')->nullable();
            $table->string('sandi')->nullable();
            $table->string('pembayaran')->nullable();
            $table->string('validasi')->nullable();
            $table->string('kesehatan')->nullable();
            $table->string('simaksi')->nullable();
            $table->dateTime('last_update')->nullable();
            $table->longText('agency')->nullable();
            $table->string('flag')->nullable();
            $table->tinyInteger('batal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
