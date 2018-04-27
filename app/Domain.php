<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //
	 public function user_domain()
    {
        return $this->hasMany('App\User_domain');
    }
}
