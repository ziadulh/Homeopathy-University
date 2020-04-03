<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['web_title','logo','phone','third_party_code','address','copy_rights','meta_tag','site_admin_phone','site_admin_email','created_by','updated_by','fb','tw','ins'];
}
