<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checker extends Model
{
    protected $fillable = ['jenis', 'kategori', 'id_kualitas'];

    public function kualitas()
    {
        return $this->belongsTo(Quality::class, 'id_kualitas');
    }
}
