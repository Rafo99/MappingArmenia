<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
}
