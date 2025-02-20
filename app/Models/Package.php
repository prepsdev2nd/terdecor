<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'type',
    ];

    public function images()
    {
        return $this->hasMany(PackageImages::class);
    }

    public function details()
    {
        return $this->hasMany(PackageDetails::class);
    }
}
