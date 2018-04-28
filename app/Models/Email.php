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

    /**
     * Gets the user attached to the email
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Checks if this email is the users default email
     *
     * @return bool
     */
    public function isDefault() {
        $default_id = $this->user()->select('default_email_id')->first()->default_email_id;

        return $this->id === $default_id;
    }
}
