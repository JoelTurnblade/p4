<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function users() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
