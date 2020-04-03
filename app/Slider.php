<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'description', 'photo', 'publish', 'created_by', 'updated_by',
    ];
}
