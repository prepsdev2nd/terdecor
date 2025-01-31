<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Design extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'tags',
        'type',
        'material',
        'size,',
        'status'
    ];

    public function images()
    {
        return $this->hasMany(DesignImages::class);
    }
}
