<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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
        'image',
        'content',
        'tags',
        'status'
    ];
}
