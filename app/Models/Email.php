<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emails';

    protected $fillable = [
        'email', 'is_default', 'user_id'
    ];

    /**
     * Gets the user attached to the email
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
