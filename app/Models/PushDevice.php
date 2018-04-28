<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushDevice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'push_devices';

    /**
     * Gets the user attached to the push device
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
