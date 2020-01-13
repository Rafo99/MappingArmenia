<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    public $timestamps = false;
    protected $fillable = ['image_id', 'text'];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
