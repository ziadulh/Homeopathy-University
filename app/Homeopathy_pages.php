<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homeopathy_pages extends Model
{
    protected $fillable = ['title','description','photo','created_by','updated_by','publish','slug','third_party_code',];
}
