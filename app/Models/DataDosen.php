<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDosen extends Model
{
    use HasFactory;

    protected $table = 'data_dosens';

    protected $fillable = [
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
    ];

    protected $casts = [
        'tanggal_sertifikat_nrp' => 'date',
        'tanggal_lahir' => 'date',
    ];
}
