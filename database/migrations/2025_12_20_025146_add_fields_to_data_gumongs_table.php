<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_gumongs', function (Blueprint $table) {

            $table->string('nrp')->nullable();
            $table->string('no_sertifikat_nrp')->nullable();
            $table->date('tanggal_sertifikat_nrp')->nullable();

            $table->string('npsn_lptk')->nullable();
            $table->string('nama_lptk')->nullable();

            $table->string('kode_jenis_peserta')->nullable();
            $table->string('jenis_peserta')->nullable();

            $table->string('kode_rumpun')->nullable();
            $table->string('nama_rumpun')->nullable();

            $table->string('kode_bidang_studi_ppg')->nullable();
            $table->string('nama_bidang_studi_ppg')->nullable();

            $table->string('kategori_peserta')->nullable();

            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();

            $table->string('nik')->nullable();
            $table->string('npwp')->nullable();

            $table->string('nidn')->nullable();
            $table->string('nuptk')->nullable();

            $table->string('golongan_pns_asn')->nullable();

            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();

            $table->string('npsn_instansi_asal')->nullable();
            $table->string('nama_instansi_asal')->nullable();

            $table->string('pendidikan_terakhir')->nullable();

            $table->string('id_rekrutmen')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('data_gumongs', function (Blueprint $table) {
            $table->dropColumn([
                'nrp',
                'no_sertifikat_nrp',
                'tanggal_sertifikat_nrp',
                'npsn_lptk',
                'nama_lptk',
                'kode_jenis_peserta',
                'jenis_peserta',
                'kode_rumpun',
                'nama_rumpun',
                'kode_bidang_studi_ppg',
                'nama_bidang_studi_ppg',
                'kategori_peserta',
                'nama',
                'email',
                'no_hp',
                'nik',
                'npwp',
                'nidn',
                'nuptk',
                'golongan_pns_asn',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'npsn_instansi_asal',
                'nama_instansi_asal',
                'pendidikan_terakhir',
                'id_rekrutmen',
            ]);
        });
    }
};
