<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo', 'serial_no', 'name', 'nid', 'dhms_stdn', 'bhms_stdn', 'other_stdn','session_stdn','dhms_dctr', 'bhms_dctr', 'other_dctr','regNo_dctr', 'npp','institute','address','country','city','phone','email','payment','signature','password','publish','user_type','created_by','updated_by','AcNumber','Transaction_no','nid_or_passport_check'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
