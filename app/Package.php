<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['tour_id', 'picture'];

    public function parent ()
    {
        return $this->belongsTo(Tour::class, 'package_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'package_id', 'id');
    }
}
