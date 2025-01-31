<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignImages extends Model
{

    protected $fillable = ['design_id', 'image_path', 'image_type'];

    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}
