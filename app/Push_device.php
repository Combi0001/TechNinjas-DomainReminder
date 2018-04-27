<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Push_device extends Model
{
    //
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
