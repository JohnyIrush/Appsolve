<?php

namespace App\StaticCms;

use Illuminate\Database\Eloquent\Model;

class AppPages extends Model
{
    /** 
     * my table
    */
    protected $table = "app_pages";
       /**
     * Get the comments for the blog post.
     */
    public function sections()
    {
        return $this->hasMany('App\PageSections');
    }
 
}
