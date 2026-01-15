<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanGtk extends Model
{
    use HasFactory;

    protected $table = 'laporan_gtks';

    protected $fillable = [
        'kategori',
        'kode',
        'komponen_rab',
        'rasilasi',
        'tanggal',
        'deskripsi_kegiatan',
        'pic',
        'acara',
        'folder_bukti',
        'bukti_akademik',
        'bukti_keuangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
