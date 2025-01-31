<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDetails extends Model
{
    protected $fillable = ['package_id', 'title'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
