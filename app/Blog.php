<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'text'];
    protected $fillable = ['picture'];
}
