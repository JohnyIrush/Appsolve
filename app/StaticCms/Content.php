<?php

namespace App\StaticCms;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
     /**
     * Get the contents for the Page Section.
     */
    public function type()
    {
        return $this->hasOne('App\ContentType');
    }
}
