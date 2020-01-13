<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['parent_id', 'picture'];

    public function parent ()
    {
        return $this->belongsTo(Tour::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Tour::class, 'parent_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'tour_id', 'id');
    }
}
