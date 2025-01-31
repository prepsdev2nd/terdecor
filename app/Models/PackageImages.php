<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageImages extends Model
{
    protected $fillable = ['package_id', 'image_path', 'image_type'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
