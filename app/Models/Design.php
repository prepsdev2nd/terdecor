<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Design extends Model
{
    public $incrementing = false; // Non-auto increment
    protected $keyType = 'string'; // UUID adalah string

    protected static function booted()
    {
        static::creating(function ($uuid) {
            $uuid->id = (string) Str::uuid(); // Generate UUID sebelum insert
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'tags',
        'pic1',
        'pic2',
        'pic3',
        'pic4',
        'pic5',
        'type',
        'material',
        'size,',
        'status'
    ];
}
