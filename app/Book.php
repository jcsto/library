<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // turns off mass assignment protection
    protected $guarded = [];
}