<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'surname', 'mobile',
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

    protected $dates = ['deleted_at'];
    
    public function contact()
    {
        return $this->hasOne('App\Contact');
    }

    public function employment()
    {
        return $this->hasOne('App\Employment');
    }

    public function rb_files()
    {
        return $this->hasMany('App\RbFile');
    }

    //for sending SMS through Voyage/Nexmo
    public function routeNotificationForNexmo($notification)
    {
        return $this->mobile;
    }
}
