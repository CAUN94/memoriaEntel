<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function Reports()
    {
    	 return $this->hasMany(Report::class);
    }

      public function User()
    {
    	 return $this->hasOne(User::class);
    }
}
