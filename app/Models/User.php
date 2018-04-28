<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
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
     * Gets the default email for the user
     *
     * This email is used for reset password requests (etc)
     */
    public function defaultEmail() {
        return $this->hasOne(Email::class, 'id', 'default_email_id');
    }

    /**
     * Gets the emails associated with the user
     */
    public function emails() {
        return $this->hasMany(Email::class, 'user_id');
    }

    /**
     * Gets the domains associated with the user
     */
    public function domains() {
        return $this->belongsToMany(Domain::class, 'user_domain');
    }

    /**
     * Gets the push devices associated with the user
     */
    public function pushDevices() {
        return $this->hasMany(PushDevice::class, 'user_id');
    }
}