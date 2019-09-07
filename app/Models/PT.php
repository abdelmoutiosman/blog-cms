<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PT extends Model 
{

    protected $table = 'post_tag';
    public $timestamps = true;
    protected $fillable = array('post_id', 'tag_id');

}