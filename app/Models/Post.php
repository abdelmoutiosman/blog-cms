<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model 
{
    use SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'category_id', 'featured', 'slug','user_id');
    protected $dates=['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}