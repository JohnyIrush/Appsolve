<?php

namespace App\DynamicCms;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
   public function applications(){
       return $this->BelongsToMany('App\DynamicCms\Applications');
   }

   public function versions(){
    return $this->BelongsToMany('App\Version');

}
}
