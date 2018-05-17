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
        'name', 'username', 'password', 'email', 'email_token',
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
     * Gets the emails associated with the user
     */
    public function emails() {
        return $this->hasMany(Email::class, 'user_id');
    }

    /**
     * Gets the default email for the user
     *
     * This email is used for reset password requests (etc)
     */
    public function defaultEmail() {
        return $this->emails()->where('is_default', '=', '1')->first();
    }

    /**
     * Gets the domains associated with the user
     */
    public function domains() {
        return $this->belongsToMany(Domain::class, 'user_domain')
                    ->withPivot(['notify']);
    }

    /**
     * Gets the push devices associated with the user
     */
    public function pushDevices() {
        return $this->hasMany(PushDevice::class, 'user_id');
    }
}