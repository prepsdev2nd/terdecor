<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $fillable = ['nama', 'harga'];

    public function checkers()
    {
        return $this->hasMany(Checker::class, 'id_kualitas');
    }
}
