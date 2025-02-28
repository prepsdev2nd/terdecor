<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'name',
        'alamat',
        'kota',
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
        'desain_prioritas',
        'desain_ramah',
        'desain_suasana',
        'desain_gaya',
        'favorit_pribadi',
        'favorit_preferensi',
        'favorit_warna',
        'favorit_tidak',
        'favorit_tema',
        'favorit_tambahan',
        'favorit_desainer',
        'tanggal_survey',
        'survey',
        'status',
    ];
}
