<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'last_name', 'phone', 'email', 'start', 'end', 'number', 'tour', 'message'];
}
