<?php

namespace App\StaticCms;

use Illuminate\Database\Eloquent\Model;

class PageSections extends Model
{
    /**
     * my table
    */
    protected $table = "page_sections";
     /**
     * Get the contents for the Page Section.
     */
    public function contents()
    {
        return $this->hasMany('App\Content');
    }

}
