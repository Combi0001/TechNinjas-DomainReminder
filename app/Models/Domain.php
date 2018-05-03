<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'domains';

    /**
     * The default value for attributes
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'QUEUED',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'expiry',
        'last_checked',
        'created_at',
        'updated_at',
    ];

    /**
     * Gets the users attached to the domain
     */
    public function users() {
        return $this->belongsToMany(User::class, 'user_domain');
    }
}
