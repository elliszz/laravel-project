<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TautanBahan extends Model
{
    protected $table = 'tautan_bahans';

    protected $fillable = [
        'tautan',
        'isi_tautan',
        'keterangan',
        'tanggal_tautan',
        'sumber'
    ];
}

