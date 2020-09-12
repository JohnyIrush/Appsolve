<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
