<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = ['tour_id', 'package_id', 'slider', 'contacts', 'name'];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function texts()
    {
        return $this->hasMany(Slider::class, 'image_id', 'id');
    }
}
