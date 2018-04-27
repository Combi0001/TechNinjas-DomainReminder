<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
		public function user()
    {
        return $this->hasMany('App\User');
    }
	
		public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
