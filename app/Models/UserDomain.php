<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDomain extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_domain';

    protected $fillable = [
        'user_id', 'domain_id',
    ];

    /**
     * Gets the emails associated with the user
     */
    public function users() {
        return $this->hasMany(User::class, 'user_id');
    }

    /**
     * Gets the emails associated with the user
     */
    public function domains() {
        return $this->hasMany(Domain::class, 'domain_id');
    }
}
