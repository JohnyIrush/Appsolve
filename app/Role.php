<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //users-roles relationship->many to many
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
