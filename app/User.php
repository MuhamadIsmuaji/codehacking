<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','role_id', 'photo_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function getIsActiveAttribute($value) {
        return $value ? 'Active' : 'Not Active';
    }

    public function setPasswordAttribute($value) {

        if (!empty($value)) :
            return $this->attributes['password'] = bcrypt($value);
        endif;
    }

    public function isAdmin() {
        if ($this->role->name == 'administrator') :
            return true;
        endif;

        return false;
    }

    
}
