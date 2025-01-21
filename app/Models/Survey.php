<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'name',
        'alamat',
        'handphone',
        'email',
        'luas_ruangan',
        'jumlah_ruangan',
        'jenis_ruangan',
        'kebutuhan_ruangan',
        'kebutuhan_rencana',
        'kebutuhan_teknis',
        'proyek_akses',
        'ruangan',
        'pertahankan',
        'diganti',
    ];
}
