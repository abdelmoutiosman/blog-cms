<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = array('tag');

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

}