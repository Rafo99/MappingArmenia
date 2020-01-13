<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'last_name', 'phone', 'email', 'start', 'end', 'number', 'accent', 'message'];
}
