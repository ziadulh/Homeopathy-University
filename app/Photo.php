<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title','album_id','description','photo','publish','created_by','updated_by',];
}
