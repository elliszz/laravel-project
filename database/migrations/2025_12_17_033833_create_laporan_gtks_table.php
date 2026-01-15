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
        Schema::create('laporan_gtks', function (Blueprint $table) {
            $table->id();

            $table->string('kategori');          // Kategori
            $table->string('kode');              // Kode
            $table->string('komponen_rab');      // Komponen RAB
            $table->string('rasilasi')->nullable(); // Rasilasi

            // Tanggal + Bulan digabung
            $table->date('tanggal');

            $table->text('deskripsi_kegiatan');  // Deskripsi Kegiatan
            $table->string('pic');               // PIC
            $table->string('acara');             // Acara

            // Bukti (opsional: link / teks / boleh kosong)
            $table->text('folder_bukti')->nullable();
            $table->text('bukti_akademik')->nullable();
            $table->text('bukti_keuangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_gtks');
    }
};
